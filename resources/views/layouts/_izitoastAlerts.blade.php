<script>
    @if(Session::has('message'))

        let type = "{{ Session::get('alert-type', 'info') }}";
        let msg = "{{ Session::get('message', 'OK') }}";

        switch (type) {
            case 'info':
                iziToast.info({
                    title: "Информация",
                    message: msg,
                    timeout: 4000,
                    position: 'bottomLeft',
                    transitionIn: 'flipInX',
                    transitionOut: 'flipOutX',
                });
                break;

            case 'warning':
                iziToast.warning({
                    title: "Предупреждение",
                    message: msg,
                    timeout: 4000,
                    position: 'bottomLeft',
                    transitionIn: 'flipInX',
                    transitionOut: 'flipOutX',
                });
                break;

            case 'success':
                iziToast.success({
                    title: "Успех",
                    message: msg,
                    timeout: 4000,
                    position: 'topCenter',
                    transitionIn: 'flipInX',
                    transitionOut: 'flipOutX',
                });
                break;

            case 'error':
                iziToast.error({
                    title: "Ошибка",
                    message: msg,
                    timeout: 4000,
                    position: 'bottomLeft',
                    transitionIn: 'flipInX',
                    transitionOut: 'flipOutX',
                });
                break;
        }

    @endif
</script>

