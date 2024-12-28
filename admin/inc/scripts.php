<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
<script>
    
    function alert(type, msg){
        let bc_class= (type=="success")? 'alert-success' : 'alert-danger';
        let element = document.createElement('div');
        element.innerHTML=`
        <div class="alert ${bc_class} alert-dismissible fade show custom-alert" role="alert">
            <strong class="me-3">${msg}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        `
        document.body.append(element);
    }



    function showModal() {
    removeAllBackdrops(); // Ensure no lingering backdrops
    var myModal = new bootstrap.Modal(document.getElementById('general-s'));
    myModal.show();
}

// Remove all backdrops from the DOM
function removeAllBackdrops() {
    document.querySelectorAll('.modal-backdrop').forEach((backdrop) => backdrop.remove());
}
</script>