
<div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
    <h3 class="text-lg font-medium text-gray-900">Add Skills</h3>

    <!-- Input para tags -->
    <form id="skills-form">
        @csrf
        <div class="mt-4">
            <x-input-label for="skills" :value="__('Skills (Use comma to separate)')" />
            <input id="skills" name="skills" type="text" class="block mt-1 w-full" data-role="" />
            <x-input-error :messages="$errors->get('skills')" />
        </div>
        <button type="button" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150" id="open-modal">
            Add Skills
        </button>
    </form>
</div>

<!-- Ventana modal con input de tags -->
<div class="modal fade" id="skillsModal" tabindex="-1" role="dialog" aria-labelledby="skillsModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="skillsModalLabel">Add Skills</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div>
                    <x-input-label for="modal-skills" :value="__('Skills (Use comma to separate)')" />
                    <input id="modal-skills" name="skills" type="text" class="form-control" data-role="tagsinput" />
                    <x-input-error :messages="$errors->get('skills')" />
                </div>
            </div>
                    <!-- Nube de etiquetas predefinidas en el modal -->
            <h6>Select from predefined skills</h6>
            <div id="modal-predefined-skills" class="mt-2">
                <span class="badge bg-secondary predefined-skill" data-skill="HTML">HTML</span>
                <span class="badge bg-secondary predefined-skill" data-skill="CSS">CSS</span>
                <span class="badge bg-secondary predefined-skill" data-skill="JavaScript">JavaScript</span>
                <span class="badge bg-secondary predefined-skill" data-skill="Laravel">Laravel</span>
                <span class="badge bg-secondary predefined-skill" data-skill="PHP">PHP</span>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="add-skills-to-input">Add Skills</button>
            </div>
        </div>
    </div>
</div>
