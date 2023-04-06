function checkFormFilled(form) {
    // Get all the input fields of the form
    const inputs = form.querySelectorAll('input');
  
    // Loop through the input fields and check if their values are empty
    for (let i = 0; i < inputs.length; i++) {
      if (inputs[i].value.trim() === '') {
        return false; // Return false if any input field is empty
      }
    }
  
    return true; // Return true if all input fields are filled
  }
  