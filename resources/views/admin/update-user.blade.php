@extends('layouts.quizz')
<main class="flex">
    <div class="bg-white h-[100vh] w-[16%]">
        <h2 class="text-center pt-6 pb-24 text-xl font-[500] text-[#4880FF] font-rubik">
            Dash <span class="text-[#000000]">Quizz</span></h2>

        <div class="flex flex-col ms-8">
            <div class="flex w-[150px] py-3 px-4 text-black rounded-lg mb-4 text-lg items-center font-rubik">
                <svg class="me-4"
                     width="20"
                     viewBox="0 0 18 16"
                     fill="none"
                     xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M5.03438 0.359375L6.06563 1.39062L3.31563 4.14062L2.8 4.57031L2.28438 4.14062L0.909375 2.76562L1.94063 1.73438L2.8 2.63672L5.03438 0.359375ZM8.3 1.5625H17.2375V2.9375H8.3V1.5625ZM5.03438 5.85938L6.06563 6.89062L3.31563 9.64062L2.8 10.0703L2.28438 9.64062L0.909375 8.26562L1.94063 7.23438L2.8 8.13672L5.03438 5.85938ZM8.3 7.0625H17.2375V8.4375H8.3V7.0625ZM5.03438 11.3594L6.06563 12.3906L3.31563 15.1406L2.8 15.5703L2.28438 15.1406L0.909375 13.7656L1.94063 12.7344L2.8 13.6367L5.03438 11.3594ZM8.3 12.5625H17.2375V13.9375H8.3V12.5625Z"
                        fill="black"/>
                </svg>
                <a href="/admin">Quizz</a>
            </div>
            <div class="flex bg-[#4880FF] text-white w-[150px] py-2 px-4 rounded-lg text-lg items-center font-rubik">
                <svg class="me-4"
                     width="18"
                     viewBox="0 0 15 16"
                     fill="none"
                     xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M3.91797 1.60547C4.86328 0.660156 5.99479 0.1875 7.3125 0.1875C8.63021 0.1875 9.76172 0.660156 10.707 1.60547C11.6523 2.55078 12.125 3.68229 12.125 5C12.125 5.80208 11.9245 6.5612 11.5234 7.27734C11.151 7.99349 10.6354 8.56641 9.97656 8.99609C11.237 9.54036 12.2539 10.3854 13.0273 11.5312C13.8008 12.6484 14.1875 13.9089 14.1875 15.3125H12.8125C12.8125 13.7943 12.2682 12.5052 11.1797 11.4453C10.1198 10.3568 8.83073 9.8125 7.3125 9.8125C5.79427 9.8125 4.49089 10.3568 3.40234 11.4453C2.34245 12.5052 1.8125 13.7943 1.8125 15.3125H0.4375C0.4375 13.9089 0.824219 12.6484 1.59766 11.5312C2.37109 10.3854 3.38802 9.54036 4.64844 8.99609C3.98958 8.56641 3.45964 7.99349 3.05859 7.27734C2.6862 6.5612 2.5 5.80208 2.5 5C2.5 3.68229 2.97266 2.55078 3.91797 1.60547ZM9.71875 2.59375C9.0599 1.90625 8.25781 1.5625 7.3125 1.5625C6.36719 1.5625 5.55078 1.90625 4.86328 2.59375C4.20443 3.2526 3.875 4.05469 3.875 5C3.875 5.94531 4.20443 6.76172 4.86328 7.44922C5.55078 8.10807 6.36719 8.4375 7.3125 8.4375C8.25781 8.4375 9.0599 8.10807 9.71875 7.44922C10.4062 6.76172 10.75 5.94531 10.75 5C10.75 4.05469 10.4062 3.2526 9.71875 2.59375Z"
                        fill="white"/>
                </svg>
                <a href="/admin/users">Users</a>
            </div>
        </div>
    </div>
    <div class="my-24 mx-10 font-rubik w-[100%]">
        <h2 class="text-4xl mt-10 font-[500] mb-8">Update User</h2>
        <div class="bg-white flex justify-center p-5">
            <form class="mb-0 mt-20 mb-20 flex flex-col items-center justify-center" action="{{ route('admin.update-user', $user->id) }}" method="POST">
                @csrf
                @method('PATCH')
                <!-- Email Address -->
                <div class="flex flex-col text-[#606060] mb-[3rem]">
                    <label for="username" class="text-[14px] ms-2">Username</label>
                    <input type="text" class="bg-[#F5F6FA] mt-3 p-4 rounded-lg w-[360px] h-[52px] border border-[#D5D5D5]" name="username" id="username" value="{{ $user->name }}">
                </div>

                <div class="flex flex-col text-[#606060] mb-[3rem]">
                    <label for="email" class="text-[14px] ms-2">Email</label>
                    <input type="text" class="bg-[#F5F6FA] mt-3 p-4 rounded-lg w-[360px] h-[52px] border border-[#D5D5D5]" name="email" id="email" value="{{ $user->email }}">
                </div>

                <div class="flex flex-col text-[#606060] mb-[3rem]">
                    <label for="password" class="text-[14px] ms-2">Password</label>
                    <input type="text" class="bg-[#F5F6FA] mt-3 p-4 rounded-lg w-[360px] h-[52px] border border-[#D5D5D5]" name="password" id="password" value="{{ $user->password }}">
                </div>

                <button type="submit" class="bg-[#4880FF] text-white py-3 px-16 rounded-lg">
                    Update Now
                </button>
            </form>
        </div>
    </div>
</main>
<script src="https://kit.fontawesome.com/56470d45d0.js"
        crossorigin="anonymous"></script>
