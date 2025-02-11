$(document).ready(function(){
    
	$('.form-request').on('submit', function(e){
		e.preventDefault()

        //let _form    = document.getElementsByClassName('api-request')[0]
        let _form    = '.form-request'
        let _action  = $(this).attr('action')
        let _method  = $(this).attr('method')
        let _data    = new FormData(this)
        let _target  = ''

        if ($(this).attr('data-target') !== 'undefined'){
            _target = $(this).attr('data-target')
        }

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

            },
            statusCode:
            {
                200: function (response) {
                    //$('.layout-bg').fadeOut(300)

                    if (_target == '' || _target == null) 
                    {
                        for (data in response) 
                        {
                            let notyf = new Notyf({
                                duration: 5000,
                                position: {
                                    x: 'center',
                                    y: 'bottom',
                                }
                            })

                            notyf.success(data.replace('_', ' ')+' '+response[data])
                            break
                        }
                    }
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

                        notyf.error(data.replace('_', ' ')+' '+response.responseJSON[data])
                        break
                    }
                }
            },
            success: function(data)
            {
                // Redirect URL
                if (_target !== '' || _target !== null) {
                    setTimeout(function (){
                        window.location.href = _target
                    }, 2000)
                }
                
                // Reset form inputs
                $(_form)[0].reset()
                $(_form).find("input[type=file]").val('')
                $(_form).find("input[type=text], textarea, input[type=file]").val('')
                $(_form).trigger("reset").find("input[type=file]").val('')
            }
		})

		return false
	})


    /** Remove Alert **/
    $('.remove-button').on('click', function() {
        $(this).closest('.alert').addClass('d-none')
    })

})





/** Change logo by theme mood **/
const changeThemeLogo = () => 
{
    let mood = document.getElementById('theme-mood')
    let currentMood = mood.getAttribute('aria-label')

    if (currentMood == 'light') {
        document.getElementsByClassName('logo-icon')[0].setAttribute('src', document.getElementsByClassName('logo-icon')[0].getAttribute('data-dark'))
    } else if (currentMood == 'dark') {
        document.getElementsByClassName('logo-icon')[0].setAttribute('src', document.getElementsByClassName('logo-icon')[0].getAttribute('data-light'))
    }
}
changeThemeLogo()

document.getElementById('theme-mood').addEventListener('click', function (){
    changeThemeLogo()
})
