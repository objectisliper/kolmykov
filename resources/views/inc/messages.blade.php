@if(session()->has('success'))
    <script>
        $(function () {
            alertify.alert(" {!! session()->get('success') !!}");
            alertify.success(" {!! session()->get('success') !!}");
        })
    </script>
@elseif(session()->has('error'))
    <script>
        $(function () {
            alertify.alert(" {!! session()->get('error') !!}");
            alertify.error(" {!! session()->get('error') !!}");
        })
    </script>
@elseif (session()->has('errors'))
    <?php $errors = session()->get('errors'); $messages =""; ?>
    @foreach ($errors->all("<p>:message</p>") as $message)
        <?php $messages .= $message; ?>
    @endforeach
    <script>
        $(function () {
            alertify.alert(" {!! $messages !!}");
            alertify.error(" {!! $messages !!}");
        })
    </script>
@endif