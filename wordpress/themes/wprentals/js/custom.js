(function($) {
    "use strict";
    $(document).ready(function() {
        $('#booking-rooms').change(function() {
          window.location = $(this).find(':selected').attr('data-id')
        });
    });
    $('#prop_category_submit').select2({
        multiple: true,
    });
})(jQuery);

const tabs = document.querySelectorAll('.tabs__btn');
const tabsContent = document.querySelectorAll('.tabs__body');

if (tabsContent.length > 0 || tabs.length > 0) {

    function hideTabContent() {
        tabsContent.forEach(item => {
            item.classList.remove('active');
        });

        tabs.forEach(item => {
            item.classList.remove('active');
        });
    }

    function showTabContent(i = 0) {
        tabsContent[i].classList.add('active');
        tabs[i].classList.add('active');
    }

    hideTabContent();
    showTabContent();

    tabs.forEach((tab, index) => {
        tab.addEventListener('click', () => {
            hideTabContent();
            showTabContent(index);
        });
    });
}

var input = document.querySelector("#usermobile");
if (input) {
    var iti = window.intlTelInput(input, {
        separateDialCode: false,
        preferredCountries: ["jp", "gb", "us"],
        initialCountry:"jp",
        //utilsScript: '/wp-content/themes/wprentals/js/utils.js'
    });
    var conuntry_set      =  input.getAttribute('data-intltel');
    if (!conuntry_set) {
        conuntry_set = 'jp';
    }
    iti.setCountry(conuntry_set);
}
