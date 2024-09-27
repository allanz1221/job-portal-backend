<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <!-- Bootstrap -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

        <!-- Bootstrap Tags Input -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>

        <style>
            .predefined-skill {
                cursor: pointer;
                margin-right: 5px;
                padding: 5px 10px;
                font-size: 14px;
                border-radius: 15px;
                background-color: #f0f0f0;
                color: #333;
                display: inline-block;
            }
            .bootstrap-tagsinput .tag {
                margin-right: 2px;
                color: #000000;
            }
            .predefined-skill:hover {
                background-color: #ddd;
            }
        </style>
        
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased"> 
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
        <script>
        $(document).ready(function () {


            $('#skills').click(function () {
                let modalSkills = $('#modal-skills').val();  // Obtener las skills del modal
                let skillsArray = modalSkills.split(',');

                // Agregar las skills al input principal
                skillsArray.forEach(function (skill) {
                    $('#skills').tagsinput('add', skill.trim());
                });

                // Enviar automáticamente las skills al servidor
                let token = $("input[name='_token']").val();
                $.ajax({
                    url: "{{ route('skills.store') }}",
                    type: "POST",
                    data: {
                        skills: $('#skills').val(),
                        _token: token
                    },
                    success: function (response) {
                        alert('Skills saved successfully!');
                        $('#skills').tagsinput('removeAll');  // Limpiar input principal después de guardar
                        loadSkills();  // Recargar las skills guardadas
                    },
                    error: function (error) {
                        console.log(error);
                    }
                });

                // Cerrar el modal
                $('#skillsModal').modal('hide');
            });

            
            // 1. Cargar las habilidades guardadas al iniciar
            function loadSkills() {
                $.ajax({
                    url: "{{ route('user.skills') }}",  // Ruta para obtener las skills del usuario
                    type: "GET",
                    success: function (response) {
                        // Limpiar el input antes de agregar las nuevas skills
                        $('#skills').tagsinput('removeAll');

                        // Agregar cada skill obtenida al input principal
                        response.forEach(function (skill) {
                            $('#skills').tagsinput('add', skill);
                        });
                    },
                    error: function (error) {
                        console.log(error);
                    }
                });
            }

            // Llamar a loadSkills para cargar las habilidades cuando cargue la página
            loadSkills();

            // 2. Abrir el modal al presionar el botón "Add Skills"
            $('#open-modal').click(function () {
                $('#skillsModal').modal('show');  // Mostrar el modal
            });

            // 3. Agregar la funcionalidad de las etiquetas predefinidas dentro del modal
            $('.predefined-skill').click(function () {
                let skill = $(this).data('skill');
                $('#modal-skills').tagsinput('add', skill);  // Agregar la skill al input del modal
            });

            // 4. Al hacer clic en "Add Skills", mover las skills del modal al input principal y guardarlas
            $('#add-skills-to-input').click(function () {
                let modalSkills = $('#modal-skills').val();  // Obtener las skills del modal
                let skillsArray = modalSkills.split(',');

                // Agregar las skills al input principal
                skillsArray.forEach(function (skill) {
                    $('#skills').tagsinput('add', skill.trim());
                });

                // Enviar automáticamente las skills al servidor
                let token = $("input[name='_token']").val();
                $.ajax({
                    url: "{{ route('skills.store') }}",
                    type: "POST",
                    data: {
                        skills: $('#skills').val(),
                        _token: token
                    },
                    success: function (response) {
                        alert('Skills saved successfully!');
                        $('#skills').tagsinput('removeAll');  // Limpiar input principal después de guardar
                        loadSkills();  // Recargar las skills guardadas
                    },
                    error: function (error) {
                        console.log(error);
                    }
                });

                // Cerrar el modal
                $('#skillsModal').modal('hide');
            });

            // 5. Actualizar la base de datos cuando se elimine una skill
            $('#skills').on('itemRemoved', function(event) {
                let removedSkill = event.item;  // Obtener la habilidad eliminada
                let token = $("input[name='_token']").val();

                // Enviar una solicitud AJAX para eliminar la skill de la base de datos
                $.ajax({
                    url: "{{ route('skills.delete') }}",  // Ruta para eliminar la skill
                    type: "POST",
                    data: {
                        skill: removedSkill,
                        _token: token
                    },
                    success: function (response) {
                        console.log('Skill removed successfully');
                    },
                    error: function (error) {
                        console.log(error);
                    }
                });
            });
        });

        
        </script>
        
        
        
        
    </body>
</html>
