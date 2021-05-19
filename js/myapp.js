$(document).ready(function() {
    // prefill the form

    let startDate = new Date();
    let startDateString = startDate.toISOString().slice(0,16);
    let endDate = new Date();
    endDate.setDate(startDate.getDate() + 7);
    let endDateString = endDate.toISOString().slice(0,16);
    // let today = new Date();
    // let plusOneWeek = new Date();
    // plusOneWeek.setDate(today.getDate()+7);
    document.getElementById('form-start-date').value = startDateString;
    document.getElementById('form-end-date').value = endDateString;

    // turn the form into a JSON string

    let formContentsAsJson = JSON.stringify($('#content-div-quote-form').serializeJSON());

    // Make API calls with buttons

    $('#content-button-iam').on(
        'click',
        function() {
            $.ajax({
                contentType: 'application/json; charset=utf-8',
                data: formContentsAsJson,
                error: function (request, status, error) {
                    alert('Noped out on the auth compadre.');
                },
                success: function (data, text) {
                    console.log('Yaaay!')
                },
                type: 'post',
                url: '/api/v1/authenticate'
            })
        }
    );

    $('#content-button-iamnot').on(
        'click',
        function () {
            $.ajax({
                error: function (request, status, error) {
                    alert('Why can\'t I log out!');
                },
                success: function (data, text) {
                    console.log('I am not John.')
                },
                type: 'delete',
                url: '/api/v1/authenticate'
            })
        }
    );

    $('#content-button-four-bells').on(
        'click',
        function() {
            let token = document.cookie.substring(11) || '';
            let authHeader = 'Bearer ' + token;
            $.ajax({
                beforeSend: function (xhr) {
                    xhr.setRequestHeader("Authorization", authHeader);
                },
                contentType: 'application/json; charset=utf-8',
                data: formContentsAsJson,
                dataType: 'json',
                error: function (request, status, error) {
                    alert('Now I\'ll never get my insurance!');
                },
                //headers: authHeader,
                success: function (data, text) {
                    //...
                },
                type: 'post',
                url: '/api/v1/quotation'
            })
        }
    );
});