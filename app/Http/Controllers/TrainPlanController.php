<?php

namespace App\Http\Controllers;

use App\Models\KaryawanModel;
use App\Models\TrainingPlanModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\NullableType;

class TrainPlanController extends Controller
{
    public function index()
    {
        // Mengambil data pelatihan dengan relasi ke karyawan
        $trainingPlans = TrainingPlanModel::with('karyawan')->get();

        // Data yang akan dikirim ke view
        $data = [
            'title'     => 'Training Plan',
            'breadcome' => 'Training Plan',
            'trainingPlans' => $trainingPlans
        ];

        // Mengirim data ke view
        return view('pages.trainingplant.index', $data);
    }

    public function create()
    {
        // Get the currently authenticated user
        $user = Auth::user();

        // Check if the user is HRD or superadmin
        if ($user->role === 'hrd' || $user->role === 'super admin') {
            // HRD or Superadmin can see all employees
            $karyawan = KaryawanModel::all();
        } else {
            // Karyawan can only see their own data
            $karyawan = KaryawanModel::where('user_id', $user->id)->get();
        }

        // Prepare the data to pass to the view
        $data = [
            'title'     => 'Training Plan',
            'breadcome' => 'Training Plan',
            'karyawan'  => $karyawan
        ];

        // Send data to the view
        return view('pages.trainingplant.create', $data);
    }

    public function store(Request $request)
    {
        // Get the currently authenticated user
        $user = Auth::user();
        // Validate the request
        $validatedData = $request->validate([
            'karyawan_id' => 'required|exists:karyawan,id', // Ensure karyawan_id exists in the Karyawan table
            'no_id' => '',
            'nama_pelatihan' => 'required|string',
            'target_pelatihan' => 'required|date',
            'cost' => 'required|numeric',
        ]);

        // If the user is a Karyawan, only allow them to submit their own data
        if ($user->role === 'karyawan' && $validatedData['karyawan_id'] != $user->karyawan->id) {
            return redirect()->back()->with('error', 'You can only submit your own Training Plan.');
        }

        // Create the new Training Plan
        TrainingPlanModel::create($validatedData);

        // Redirect with a success message
        return redirect()->route('training-plans.index')->with('success', 'Training Plan has been submitted successfully.');
    }

    public function edit($id)
    {
        $trainingPlan = TrainingPlanModel::with('karyawan')->findOrFail($id);
        $user = Auth::user();

        // Jika bukan admin/hrd/super admin, pastikan hanya bisa edit miliknya sendiri
        if (!in_array($user->role, ['hrd', 'super admin']) && $trainingPlan->karyawan->user_id != $user->id) {
            return redirect()->route('training-plans.index')->with('error', 'Anda tidak memiliki izin untuk mengedit data ini.');
        }

        $karyawan = $user->role === 'karyawan'
            ? KaryawanModel::where('user_id', $user->id)->get()
            : KaryawanModel::all();

        $data = [
            'title'        => 'Training Plan',
            'breadcome'    => 'Training Plan',
            'trainingPlan' => $trainingPlan,
            'karyawan'     => $karyawan
        ];

        return view('pages.trainingplant.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $trainingPlan = TrainingPlanModel::with('karyawan')->findOrFail($id);
        $user = Auth::user();

        if (!in_array($user->role, ['hrd', 'super admin']) && $trainingPlan->karyawan->user_id != $user->id) {
            return redirect()->route('training-plans.index')->with('error', 'Anda tidak memiliki izin untuk memperbarui data ini.');
        }

        $validatedData = $request->validate([
            'karyawan_id' => 'required|exists:karyawan,id',
            'no_id' => '',
            'nama_pelatihan' => 'required|string',
            'target_pelatihan' => 'required|date',
            'cost' => 'required|numeric',
        ]);

        $trainingPlan->update($validatedData);

        return redirect()->route('training-plans.index')->with('success', 'Training Plan berhasil diperbarui.');
    }


    public function destroy($id)
    {
        $trainingPlan = TrainingPlanModel::with('karyawan')->findOrFail($id);
        $user = Auth::user();

        if (!in_array($user->role, ['hrd', 'super admin']) && $trainingPlan->karyawan->user_id != $user->id) {
            return redirect()->route('training-plans.index')->with('error', 'Anda tidak memiliki izin untuk menghapus data ini.');
        }

        $trainingPlan->delete();

        return redirect()->route('training-plans.index')->with('success', 'Training Plan berhasil dihapus.');
    }
}
