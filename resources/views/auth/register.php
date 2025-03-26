<?php ob_start(); ?>

<section class="flex justify-center items-center min-h-[80vh]">
    <div class="bg-white rounded-2xl shadow-lg p-8 w-full max-w-md">
        <h1 class="text-2xl font-medium text-center mb-3">Create Account</h1>
        <p class="text-gray-500 text-center text-sm mb-6">Please fill in your information to register</p>
        
        <form action="/register" method="post" class="flex flex-col gap-5">

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
                <label for="username" class="mb-2 text-sm">Full Name:</label>
                <input 
                    type="text" 
                    name="username" 
                    id="username" 
                    value="<?=old('username')?>" 
                    class="p-3 bg-gray-50 border border-gray-200 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="John Doe"
                >
                <span class="text-red-500 text-xs mt-1"><?=error('username')?></span>
            </div>
            
            <div class="flex flex-col">
                <label for="password" class="mb-2 text-sm">Password:</label>
                <input 
                    type="password" 
                    name="password" 
                    id="password"
                    class="p-3 bg-gray-50 border border-gray-200 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                >
                <span class="text-red-500 text-xs mt-1"><?=error('password')?></span>
            </div>
            
            <button 
                type="submit" 
                class="mt-2 py-3 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition-colors duration-150"
            >Create Account</button>
            
            <div class="text-center text-sm text-gray-500 mt-2">
                Already have an account? <a href="/login" class="text-blue-500 hover:underline">Sign In</a>
            </div>
        </form>
    </div>
</section>

<?php $content = ob_get_clean(); ?>
<?php require VIEWS . 'layout.php'; ?>