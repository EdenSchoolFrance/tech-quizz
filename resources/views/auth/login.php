<?php ob_start(); ?>

<section class="flex justify-center items-center min-h-[80vh]">
    <div class="bg-white rounded-2xl shadow-lg p-8 w-full max-w-md">
        <h1 class="text-2xl font-medium text-center mb-3">Login to Account</h1>
        <p class="text-gray-500 text-center text-sm mb-6">Please enter your email and password to continue</p>
        
        <form action="/login" method="post" class="flex flex-col gap-5">
            <div class="flex flex-col">
                <label for="email" class="mb-2 text-sm">Email address:</label>
                <input 
                    type="email" 
                    name="email" 
                    id="email" 
                    value="<?=old('email')?>" 
                    class="p-3 bg-gray-50 border border-gray-200 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="your.email@example.com"
                >
                <span class="text-red-500 text-xs mt-1"><?=error('email')?></span>
            </div>
            
            <div class="flex flex-col">
                <div class="flex justify-between mb-2">
                    <label for="password" class="text-sm">Password</label>
                    <a href="/forgot-password" class="text-sm text-blue-500 hover:underline">Forget Password?</a>
                </div>
                <input 
                    type="password" 
                    name="password" 
                    id="password"
                    class="p-3 bg-gray-50 border border-gray-200 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                >
                <span class="text-red-500 text-xs mt-1"><?=error('password')?></span>
            </div>
            
            <div class="flex items-center gap-2 mb-2">
                <input type="checkbox" name="remember" id="remember" class="w-4 h-4 text-blue-500">
                <label for="remember" class="text-sm text-gray-600">Remember Password</label>
            </div>
            
            <button 
                type="submit" 
                class="py-3 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition-colors duration-150"
            >Sign In</button>
            
            <div class="text-center text-sm text-gray-500 mt-2">
                Don't have an account? <a href="/register" class="text-blue-500 hover:underline">Create Account</a>
            </div>
        </form>
    </div>
</section>

<?php $content = ob_get_clean(); ?>
<?php require VIEWS . 'layout.php'; ?>