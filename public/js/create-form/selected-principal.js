/*
Program Pokok -> Prioritas Program
*/
function initSelectedPrincipal() {
    const priorityProgramSelect = document.getElementById(
        "principal_program_id"
    );
    const priorityProgramNameInput = document.getElementById("nama-program");

    // Event listener saat dropdown berubah
    priorityProgramSelect.addEventListener("change", function () {
        const selectedOption =
            priorityProgramSelect.options[priorityProgramSelect.selectedIndex];
        const priorityName = selectedOption.getAttribute("data-priority-name");
        priorityProgramNameInput.value = priorityName;

        // Set nilai pada input nama program prioritas
        //priorityProgramNameInput.value = priorityName || "";
    });
}
