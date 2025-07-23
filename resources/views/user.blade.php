<div style="max-width: 600px; margin: 2rem auto; padding: 2rem; background: #ffffff; border-radius: 8px; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;">
    <div style="margin-bottom: 2rem; text-align: center;">
        <h2 style="color: #333; font-size: 1.75rem; font-weight: 600; margin: 0 0 0.5rem 0;">Update Profile</h2>
        <p style="color: #666; font-size: 0.95rem; margin: 0;">Keep your account information up to date</p>
    </div>

    @if ($errors->any())
        <div style="background: #fee; border: 1px solid #fcc; border-radius: 6px; padding: 1rem; margin-bottom: 1.5rem;">
            <ul style="margin: 0; padding: 0; list-style: none; color: #c33;">
                @foreach ($errors->all() as $error)
                    <li style="margin-bottom: 0.25rem;">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('success'))
        <div style="background: #efe; border: 1px solid #cfc; border-radius: 6px; padding: 1rem; margin-bottom: 1.5rem; color: #363;">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('user.update', $user->id) }}" style="display: flex; flex-direction: column; gap: 1.5rem;">
        @csrf
        @method('PUT')

        <div style="display: flex; flex-direction: column; gap: 0.5rem;">
            <label for="full_name" style="font-weight: 500; color: #333; font-size: 0.9rem;">Full Name</label>
            <input 
                type="text" 
                id="full_name"
                name="full_name" 
                value="{{ old('full_name', $user->fullname) }}" 
                required
                style="padding: 0.75rem 1rem; border: 2px solid #e1e5e9; border-radius: 6px; font-size: 1rem; transition: border-color 0.2s ease; outline: none; background: #fff;"
                onfocus="this.style.borderColor='#4f46e5'"
                onblur="this.style.borderColor='#e1e5e9'"
            >
        </div>

        <div style="display: flex; flex-direction: column; gap: 0.5rem;">
            <label for="email" style="font-weight: 500; color: #333; font-size: 0.9rem;">Email Address</label>
            <input 
                type="email" 
                id="email"
                name="email" 
                value="{{ old('email', $user->email) }}" 
                required
                style="padding: 0.75rem 1rem; border: 2px solid #e1e5e9; border-radius: 6px; font-size: 1rem; transition: border-color 0.2s ease; outline: none; background: #fff;"
                onfocus="this.style.borderColor='#4f46e5'"
                onblur="this.style.borderColor='#e1e5e9'"
            >
        </div>

        <!-- <div style="display: flex; flex-direction: column; gap: 0.5rem;">
            <label for="phone" style="font-weight: 500; color: #333; font-size: 0.9rem;">Phone Number</label>
            <input 
                type="text" 
                id="phone"
                name="phone" 
                value="{{ old('phone', $user->phone) }}" 
                required
                style="padding: 0.75rem 1rem; border: 2px solid #e1e5e9; border-radius: 6px; font-size: 1rem; transition: border-color 0.2s ease; outline: none; background: #fff;"
                onfocus="this.style.borderColor='#4f46e5'"
                onblur="this.style.borderColor='#e1e5e9'"
            >
        </div> -->

        <!-- <div style="display: flex; flex-direction: column; gap: 0.5rem;">
            <label for="address" style="font-weight: 500; color: #333; font-size: 0.9rem;">Address</label>
            <textarea 
                id="address"
                name="address" 
                required
                rows="3"
                style="padding: 0.75rem 1rem; border: 2px solid #e1e5e9; border-radius: 6px; font-size: 1rem; transition: border-color 0.2s ease; outline: none; background: #fff; resize: vertical; font-family: inherit;"
                onfocus="this.style.borderColor='#4f46e5'"
                onblur="this.style.borderColor='#e1e5e9'"
            >{{ old('address', $user->address) }}</textarea>
        </div> -->

        <div style="border-top: 1px solid #e1e5e9; padding-top: 1.5rem; margin-top: 0.5rem;">
            <h3 style="color: #333; font-size: 1.1rem; font-weight: 600; margin: 0 0 1rem 0;">Change Password (Optional)</h3>
            <p style="color: #666; font-size: 0.85rem; margin: 0 0 1rem 0;">Leave blank to keep your current password</p>
            
            <div style="display: flex; flex-direction: column; gap: 1rem;">
                <div style="display: flex; flex-direction: column; gap: 0.5rem;">
                    <label for="password" style="font-weight: 500; color: #333; font-size: 0.9rem;">Old Password</label>
                    <input 
                        type="password" 
                        id="password"
                        name="current_password" 
                        placeholder="Enter new password"
                        style="padding: 0.75rem 1rem; border: 2px solid #e1e5e9; border-radius: 6px; font-size: 1rem; transition: border-color 0.2s ease; outline: none; background: #fff;"
                        onfocus="this.style.borderColor='#4f46e5'"
                        onblur="this.style.borderColor='#e1e5e9'"
                    >
                </div>    
            
            <div style="display: flex; flex-direction: column; gap: 0.5rem;">
                    <label for="password" style="font-weight: 500; color: #333; font-size: 0.9rem;">New Password</label>
                    <input 
                        type="password" 
                        id="password"
                        name="password" 
                        placeholder="Enter new password"
                        style="padding: 0.75rem 1rem; border: 2px solid #e1e5e9; border-radius: 6px; font-size: 1rem; transition: border-color 0.2s ease; outline: none; background: #fff;"
                        onfocus="this.style.borderColor='#4f46e5'"
                        onblur="this.style.borderColor='#e1e5e9'"
                    >
                </div>

                <!-- <div style="display: flex; flex-direction: column; gap: 0.5rem;">
                    <label for="password_confirmation" style="font-weight: 500; color: #333; font-size: 0.9rem;">Confirm New Password</label>
                    <input 
                        type="password" 
                        id="password_confirmation"
                        name="password_confirmation" 
                        placeholder="Confirm new password"
                        style="padding: 0.75rem 1rem; border: 2px solid #e1e5e9; border-radius: 6px; font-size: 1rem; transition: border-color 0.2s ease; outline: none; background: #fff;"
                        onfocus="this.style.borderColor='#4f46e5'"
                        onblur="this.style.borderColor='#e1e5e9'"
                    >
                </div> -->
            </div>
        </div>

        <div style="display: flex; gap: 1rem; margin-top: 1rem;">
            <button 
                type="submit"
                class="bg-yellow-500"
                style="flex: 1; background: #c27803; color: white; padding: 0.875rem 1.5rem; border: none; border-radius: 6px; font-size: 1rem; font-weight: 500; cursor: pointer; transition: background-color 0.2s ease;"
                onmouseover="this.style.backgroundColor='#4338ca'"
                onmouseout="this.style.backgroundColor='#4f46e5'"
            >
                Update Profile
            </button>
            
            <a 
                href="{{ route('user.profile') }}" 
                style="flex: 0 0 auto; background: #f8f9fa; color: #6b7280; padding: 0.875rem 1.5rem; border: 2px solid #e1e5e9; border-radius: 6px; font-size: 1rem; font-weight: 500; text-decoration: none; cursor: pointer; transition: all 0.2s ease; display: inline-flex; align-items: center; justify-content: center;"
                onmouseover="this.style.backgroundColor='#e5e7eb'; this.style.borderColor='#d1d5db'"
                onmouseout="this.style.backgroundColor='#f8f9fa'; this.style.borderColor='#e1e5e9'"
            >
                Cancel
            </a>
        </div>
    </form>
</div>

<style>
    @media (max-width: 640px) {
        div[style*="max-width: 600px"] {
            margin: 1rem !important;
            padding: 1.5rem !important;
        }
        
        div[style*="display: flex; gap: 1rem; margin-top: 1rem"] {
            flex-direction: column !important;
        }
        
        a[style*="flex: 0 0 auto"] {
            flex: 1 !important;
        }
    }
</style>