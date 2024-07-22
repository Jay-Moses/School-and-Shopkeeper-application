document.addEventListener('DOMContentLoaded', function() {
    // Form validation for add student
    const addStudentForm = document.querySelector('form[action="add.php"]');
    if (addStudentForm) {
        addStudentForm.addEventListener('submit', function(e) {
            const firstName = document.getElementById('first_name').value.trim();
            const lastName = document.getElementById('last_name').value.trim();
            const email = document.getElementById('email').value.trim();

            if (!firstName || !lastName || !email) {
                alert('Please fill in all required fields.');
                e.preventDefault();
            }
        });
    }

    // Form validation for edit student
    const editStudentForm = document.querySelector('form[action^="edit.php"]');
    if (editStudentForm) {
        editStudentForm.addEventListener('submit', function(e) {
            const firstName = document.getElementById('first_name').value.trim();
            const lastName = document.getElementById('last_name').value.trim();
            const email = document.getElementById('email').value.trim();

            if (!firstName || !lastName || !email) {
                alert('Please fill in all required fields.');
                e.preventDefault();
            }
        });
    }

    // Form validation for add teacher
    const addTeacherForm = document.querySelector('form[action="add.php"]');
    if (addTeacherForm) {
        addTeacherForm.addEventListener('submit', function(e) {
            const firstName = document.getElementById('first_name').value.trim();
            const lastName = document.getElementById('last_name').value.trim();
            const email = document.getElementById('email').value.trim();

            if (!firstName || !lastName || !email) {
                alert('Please fill in all required fields.');
                e.preventDefault();
            }
        });
    }

    // Form validation for edit teacher
    const editTeacherForm = document.querySelector('form[action^="edit.php"]');
    if (editTeacherForm) {
        editTeacherForm.addEventListener('submit', function(e) {
            const firstName = document.getElementById('first_name').value.trim();
            const lastName = document.getElementById('last_name').value.trim();
            const email = document.getElementById('email').value.trim();

            if (!firstName || !lastName || !email) {
                alert('Please fill in all required fields.');
                e.preventDefault();
            }
        });
    }

    // Confirmation dialog for delete actions
    const deleteLinks = document.querySelectorAll('a[href*="delete.php"]');
    deleteLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            if (!confirm('Are you sure you want to delete this record?')) {
                e.preventDefault();
            }
        });
    });
});
