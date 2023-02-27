const deleteFormElements = document.querySelectorAll('form.form-delete')

deleteFormElements.forEach((formElement) => {
    formElement.addEventListener('submit', function(event){
        event.preventDefault()
        const confirmPopUp = window.confirm("Are you sure you want to delete this element?")
        if(confirmPopUp) this.submit()
    })
})