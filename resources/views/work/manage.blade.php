<x-app-layout>
    <x-slot name="title">従業員の設定</x-slot>
    <x-slot name="header">WORKTIME</x-slot>
    
    <form action="/manage/post" method="POST">
        <div class="bg-white p-2 mb-2 w-1/2 mx-auto">
            <div class="text-gray-800 font-bold font-mono text-left text-xl">
                @csrf
                <input class="border-3 border-solid border-gray-800 w-4/5" type="text" name="user[hourly_wage]" placeholder="時給"/>
                <input class="border-3 border-solid border-gray-800 w-4/5" type="text" name="user[monthly_wage]" placeholder="月給"/>
            </div>
        </div>
        <div class="flex justify-center">
          <input class="border-4 border-solid border-blue-500 bg-blue-200 p-2 m-3 text-center text-5xl" type="submit" value="更新">
        </div>
    </form>
</x-app-layout>