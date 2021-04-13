<!DOCTYPE html>
<html lang="en-us">

<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Unity WebGL Player | Models</title>
    <link rel="stylesheet" href="{{ asset('TemplateData/style.css') }}">
    <script src="{{ asset('TemplateData/UnityProgress.js') }} "></script>
    <script src="{{ asset('Build/UnityLoader.js') }}"></script>
    <script>
        var unityInstance = UnityLoader.instantiate("unityContainer", "{{ asset('Build/WebGl.json') }}", {
            onProgress: UnityProgress
        });

    </script>
</head>

<body>
    <div class="webgl-content">
        <div id="unityContainer" style="width: 960px; height: 600px"></div>
        <div class="footer">
            <div class="webgl-logo"></div>
            <div class="fullscreen" onclick="unityInstance.SetFullscreen(1)"></div>
            <div class="title">Models</div>
        </div>
    </div>
</body>

<script>
    function loadFrame() {
        console.log("test");
        unityInstance.SendMessage('PatientIDText', 'setPatientID', "{{ $patients->id }}");
    };
    setTimeout(loadFrame, 3000);

</script>

</html>
