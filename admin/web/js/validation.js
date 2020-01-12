function CustomValidation() { }

CustomValidation.prototype = {
  invalidities: [],

  checkValidity: function(input) {

    var validity = input.validity;

    if (validity.patternMismatch) {
      this.addInvalidity('This is the wrong pattern for this field');
    }

    if (validity.rangeOverflow) {
      var max = getAttributeValue(input, 'max');
      this.addInvalidity('The maximum value should be ' + max);
    }

    if (validity.rangeUnderflow) {
      var min = getAttributeValue(input, 'min');
      this.addInvalidity('The minimum value should be ' + min);
    }

    if (validity.stepMismatch) {
      var step = getAttributeValue(input, 'step');
      this.addInvalidity('This number needs to be a multiple of ' + step);
    }

  },

  addInvalidity: function(message) {
    this.invalidities.push(message);
  },


  getInvalidities: function() {
    return this.invalidities.join('. \n');
  }
};

valid.addEventListener('click', function(e) {


  for (var i = 0; i < inputs.length; i++) {
    var input = inputs[i];

    if (input.checkValidity() == false) {

      var inputCustomValidation = new CustomValidation(); 
      inputCustomValidation.checkValidity(input); 
      var customValidityMessage = inputCustomValidation.getInvalidities(); 
      input.setCustomValidity(customValidityMessage); 
    }
  }
});