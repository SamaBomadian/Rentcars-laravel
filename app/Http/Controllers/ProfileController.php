<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
   public function update(ProfileUpdateRequest $request): RedirectResponse
{
    $user = $request->user();

    // تحديث البيانات الأساسية (الاسم، الإيميل، الهاتف)
    $user->fill($request->validated());
    $user->phone = $request->input('phone');

    // معالجة رفع الصورة إذا اخترتِ صورة جديدة
    if ($request->hasFile('image')) {
        // حذف الصورة القديمة من السيرفر إذا كانت موجودة
        if ($user->image && Storage::disk('public')->exists($user->image)) {
            Storage::disk('public')->delete($user->image);
        }

        // تخزين الصورة الجديدة داخل مجلد storage/app/public/profiles
        $path = $request->file('image')->store('profiles', 'public');
        $user->image = $path;
    }

    if ($user->isDirty('email')) {
        $user->email_verified_at = null;
    }

    $user->save();

    return Redirect::route('profile.index')->with('status', 'profile-updated');
}

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
    public function index()
{
    return view('profile.index');
}
}
