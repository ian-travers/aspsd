<script>
@if(Session::has('message2'))

    let type2 = "{{ Session::get('alert-type2', 'info') }}";
    let msg2 = "{{ Session::get('message2', 'OK') }}";

    switch (type2) {
        case 'info':
            iziToast.info({
                title: "Информация",
                titleSize: '1.5rem',
                titleLineHeight: '2rem',
                message: msg2,
                messageSize: '1.5rem',
                messageLineHeight: '2rem',
                timeout: 4000,
                position: 'topCenter',
                transitionIn: 'flipInX',
                transitionOut: 'flipOutX',
            });
            break;

        case 'warning':
            iziToast.warning({
                title: "Предупреждение",
                titleSize: '1.5rem',
                titleLineHeight: '2rem',
                message: msg2,
                messageSize: '1.5rem',
                messageLineHeight: '2rem',
                timeout: 6000,
                position: 'topCenter',
                transitionIn: 'flipInX',
                transitionOut: 'flipOutX',
            });
            break;

        case 'success':
            iziToast.success({
                title: "Успех",
                titleSize: '1.5rem',
                titleLineHeight: '2rem',
                message: msg2,
                messageSize: '1.5rem',
                messageLineHeight: '2rem',
                timeout: 4000,
                position: 'topCenter',
                transitionIn: 'flipInX',
                transitionOut: 'flipOutX',
            });
            break;

        case 'error':
            iziToast.error({
                title: "Ошибка",
                titleSize: '1.5rem',
                titleLineHeight: '2rem',
                message: msg2,
                messageSize: '1.5rem',
                messageLineHeight: '2rem',
                timeout: 8000,
                position: 'topCenter',
                transitionIn: 'flipInX',
                transitionOut: 'flipOutX',
            });
            break;
    }

@endif

@if(Session::has('message'))

    let type = "{{ Session::get('alert-type', 'info') }}";
    let msg = "{{ Session::get('message', 'OK') }}";

    switch (type) {
        case 'info':
            iziToast.info({
                title: "Информация",
                titleSize: '1.5rem',
                titleLineHeight: '2rem',
                message: msg,
                messageSize: '1.5rem',
                messageLineHeight: '2rem',
                timeout: 4000,
                position: 'topCenter',
                transitionIn: 'flipInX',
                transitionOut: 'flipOutX',
            });
            break;

        case 'warning':
            iziToast.warning({
                title: "Предупреждение",
                titleSize: '1.5rem',
                titleLineHeight: '2rem',
                message: msg,
                messageSize: '1.5rem',
                messageLineHeight: '2rem',
                timeout: 6000,
                position: 'topCenter',
                transitionIn: 'flipInX',
                transitionOut: 'flipOutX',
            });
            break;

        case 'success':
            iziToast.success({
                title: "Успех",
                titleSize: '1.5rem',
                titleLineHeight: '2rem',
                message: msg,
                messageSize: '1.5rem',
                messageLineHeight: '2rem',
                timeout: 4000,
                position: 'topCenter',
                transitionIn: 'flipInX',
                transitionOut: 'flipOutX',
            });
            break;

        case 'error':
            iziToast.error({
                title: "Ошибка",
                titleSize: '1.5rem',
                titleLineHeight: '2rem',
                message: msg,
                messageSize: '1.5rem',
                messageLineHeight: '2rem',
                timeout: 8000,
                position: 'topCenter',
                transitionIn: 'flipInX',
                transitionOut: 'flipOutX',
            });
            break;
    }

@endif


</script>

