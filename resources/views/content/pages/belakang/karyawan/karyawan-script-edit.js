/**
 *  Form Wizard
 */

'use strict';

(function () {
  // Flat Picker
  // --------------------------------------------------------------------

  const flatpickrDate = document.querySelector('#flatpickr-date');

  // Date
  if (flatpickrDate) {
    flatpickrDate.flatpickr({
      monthSelectorType: 'static'
    });
  }
})();

//select 2
$(function () {
  const select2 = $('.select2'),
    selectPicker = $('.selectpicker');

  // Bootstrap select
  if (selectPicker.length) {
    selectPicker.selectpicker();
  }

  // select2
  if (select2.length) {
    select2.each(function () {
      var $this = $(this);
      $this.wrap('<div class="position-relative"></div>');
      $this.select2({
        placeholder: 'Select value',
        dropdownParent: $this.parent()
      });
    });
  }
});
//datatable



//wizard edit
(function () {
  // Numbered Wizard
  // --------------------------------------------------------------------
  const wizardEdit = document.querySelector('.wizard-edit'),
    wizardEditBtnNextList = [].slice.call(wizardEdit.querySelectorAll('.btn-next')),
    wizardEditBtnPrevList = [].slice.call(wizardEdit.querySelectorAll('.btn-prev')),
    wizardEditBtnSubmit = wizardEdit.querySelector('.btn-submit');

  if (typeof wizardEdit !== undefined && wizardEdit !== null) {
    const numberedStepper = new Stepper(wizardEdit, {
      linear: false
    });
    if (wizardEditBtnNextList) {
      wizardEditBtnNextList.forEach(wizardEditBtnNext => {
        wizardEditBtnNext.addEventListener('click', event => {
          numberedStepper.next();
        });
      });
    }
    if (wizardEditBtnPrevList) {
      wizardEditBtnPrevList.forEach(wizardEditBtnPrev => {
        wizardEditBtnPrev.addEventListener('click', event => {
          numberedStepper.previous();
        });
      });
    }
    if (wizardEditBtnSubmit) {
      wizardEditBtnSubmit.addEventListener('click', event => {
        // alert('Submitted..!!');
        event.preventDefault();
      // Mengirimkan formulir secara manual
      const form = document.querySelector('form');
      form.submit();
      });
    }
  }

})();
