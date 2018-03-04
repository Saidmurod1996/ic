$(document).ready(function(){

	

	$("#language-select").change(function(){
		var locale = $(this).val();

		var _token = $("input[name=_token]").val();

		$.ajax({
			url: '/language',
			type: 'POST',
			data: {locale: locale, _token: _token},
			datatype: 'json',
			success: function(data){
				window.location.reload(true);
			},
			error: function(data){
				
			},
			beforeSend: function(){

			},
			complete: function(data){


			}
		});
	});

    $("#picture2").click(function(){
        var locale = $(this).val();

        var _token = $("input[name=_token]").val();

        $.ajax({
            url: '/language',
            type: 'POST',
            data: {locale: locale, _token: _token},
            datatype: 'json',
            success: function(data){
                window.location.reload(true);
            },
            error: function(data){

            },
            beforeSend: function(){

            },
            complete: function(data){


            }
        });
    });


});

var app = angular.module('myApp', []);
app.controller('myCtrl', function($scope, $timeout) {
    $scope.show = true;
    $timeout(function () {
        $scope.show = false;
    }, 3000);
});

