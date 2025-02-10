$(document).ready(function(){
    
	$('.form-request').on('submit', function(e){
		e.preventDefault()

        //let _form    = document.getElementsByClassName('api-request')[0]
        let _action  = $(this).attr('action')
        let _method  = $(this).attr('method')
        let _data    = new FormData(this)

		$.ajax({
            url: _action,
            method: _method,
            datatType : 'json',
            data: _data,
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function()
            {
                //$('.layout-bg').fadeIn(300)
            },
            statusCode:
            {
                200: function (response) {
                    //$('.layout-bg').fadeOut(300)

                    for (data in response) 
                    {
                        let notyf = new Notyf({
                            duration: 5000,
                            position: {
                                x: 'center',
                                y: 'bottom',
                            }
                        })

                        notyf.success(data.replace('_', ' ')+' '+response[data]+'.')

                        break
                    }

                    /*
                    new RetroNotify({
                        contentHeader: 'Done!',
                        contentText: response,
                        style: 'sky',
                        animate: 'slideTopRight'
                    })
                    */
                    // Snackbar.show({
                    //     text: `${response}`,
                    //     width: 'auto',
                    //     //pos: 'top-center',
                    //     duration: 10000,
                    //     actionTextColor: '#fff',
                    //     backgroundColor: '#78cc41',//'#4361ee',
                    //     showAction: false
                    // }); 

                    // // Redirect
                    // setTimeout(function(){
                    //     let redirect = $('.form-ajax').attr('data-redirect')
                    //     if (redirect == '0') {

                    //     } else {
                    //        window.location.href = redirect
                    //     }
                    // }, 2000)
                },
                500: function (response) {
                    //$('.layout-bg').fadeOut(300)

                    for (data in response.responseJSON) 
                    {
                        let notyf = new Notyf({
                            duration: 5000,
                            position: {
                                x: 'center',
                                y: 'bottom',
                            }
                        })

                        notyf.error(data.replace('_', ' ')+' '+response.responseJSON[data]+'.')

                        break
                    }

                    /*
                    new RetroNotify({
                        contentHeader: response.responseJSON.header,
                        contentText: response.responseJSON.errorMsg,
                        
                        //background: '#D35050',
                        //color: '#FFF'
                        
                        style: 'yellow',
                    })
                    */

                    // Snackbar.show({
                    //     text: `${response.responseJSON.errorMsg}`,
                    //     width: 'auto',
                    //     //pos: 'top-center',
                    //     duration: 10000,
                    //     //actionTextColor: '#fff',
                    //     backgroundColor: '#1f2232',
                    //     showAction: false
                    // }); 

                    // console.log(response)
                }
            },
            success: function(data)
            {
                //$('.layout-bg').fadeOut(300)
            	//$('.error-msg').html(data)
            }
		});

		return false
	})

})