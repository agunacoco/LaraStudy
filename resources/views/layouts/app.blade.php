<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>

            <!-- Page Content -->
            <main id="app">
                {{ $slot }}
            </main>
        </div>
        <script>
            function onDelete(e){
              myform = document.getElementById('form');
              flag = confirm('삭제하시겠습니까?');
              if(flag){
                myform.submit();
              }else{
                e.preventDefault(); 
              }
            }
            function deleteImage(id){
                // getElementById는 id가 editForm인 form을 찾는다
                editForm = document.getElementById('editForm'); 
                // method는http 요청 타입
                // value는 서버에 전송할 필드 값
                editForm._method.value = 'delete';
                // action은 요청을 보낼 URL
                editForm.action = '/posts/'+id+'/image';
                // submit()은 form을 전송
                editForm.submit();
                return false;
            }
          </script>
    </body>
</html>
