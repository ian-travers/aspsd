<script>
    @if(Session::has('message'))

        let type = "{{ Session::get('alert-type', 'info') }}";
        let msg = "{{ Session::get('message', 'OK') }}";

        switch (type) {
            case 'info':
                iziToast.info({
                    title: "Информация",
                    titleSize: '2rem',
                    message: msg,
                    messageSize: '2rem',
                    timeout: 4000,
                    position: 'bottomLeft',
                    transitionIn: 'flipInX',
                    transitionOut: 'flipOutX',
                });
                break;

            case 'warning':
                iziToast.warning({
                    title: "Предупреждение",
                    titleSize: '2rem',
                    message: msg,
                    messageSize: '2rem',
                    timeout: 4000,
                    position: 'bottomLeft',
                    transitionIn: 'flipInX',
                    transitionOut: 'flipOutX',
                });
                break;

            case 'success':
                iziToast.success({
                    title: "Успех",
                    titleSize: '2rem',
                    message: msg,
                    messageSize: '2rem',
                    timeout: 4000,
                    position: 'topCenter',
                    transitionIn: 'flipInX',
                    transitionOut: 'flipOutX',
                });
                break;

            case 'error':
                iziToast.error({
                    title: "Ошибка",
                    titleSize: '2rem',
                    message: msg,
                    messageSize: '2rem',
                    timeout: 4000,
                    position: 'bottomLeft',
                    transitionIn: 'flipInX',
                    transitionOut: 'flipOutX',
                });
                break;
        }

    @endif
</script>

