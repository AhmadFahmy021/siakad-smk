@extends('layout.main')
@section('main')
    <div class="page-content">
        <div class="page d-none d-sm-flex align-items-center mb-3">
            <h3>Scan Qr Code</h3>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-6">
                        {{-- <div class="mb-3">
                            <a class="btn btn-primary btn-sm" id="startButton">Start Scan</a>
                            <a class="btn btn-danger btn-sm" id="resetButton">Stop Scan</a>
                        </div> --}}

                        <div class="mb-3">
                            {{-- <input type="hidden" name="kode" value="{{  }}"> --}}
                            <video id="video" class="form-control" width="250" height="250"></video>
                        </div>

                        <div id="sourceSelectPanel" class="mb-1" style="display:none">
                            <label for="sourceSelect">Change video source:</label>
                            <select class="form-control" id="sourceSelect" style="max-width:400px">
                            </select>
                        </div>

                        {{-- <button class="btn btn-primary" type="submit" onclick="tombol()">Submit</button> --}}
                        <label>Result:</label>
                        <pre><code id="result"></code></pre>
                        <a href="{{ url()->previous() }}" class="btn btn-danger">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script type="text/javascript" src="https://unpkg.com/@zxing/library@latest/umd/index.min.js"></script>
    <script type="text/javascript">
        
        window.addEventListener('load', function() {
            let selectedDeviceId;
            const codeReader = new ZXing.BrowserMultiFormatReader()
            // console.log('ZXing code reader initialized')
            codeReader.listVideoInputDevices()
                .then((videoInputDevices) => {
                    const sourceSelect = document.getElementById('sourceSelect')
                    selectedDeviceId = videoInputDevices[0].deviceId
                    if (videoInputDevices.length >= 1) {
                        videoInputDevices.forEach((element) => {
                            const sourceOption = document.createElement('option')
                            sourceOption.text = element.label
                            sourceOption.value = element.deviceId
                            sourceSelect.appendChild(sourceOption)
                        })

                        sourceSelect.onchange = () => {
                            selectedDeviceId = sourceSelect.value;
                        };

                        const sourceSelectPanel = document.getElementById('sourceSelectPanel')
                        sourceSelectPanel.style.display = 'block'
                    }
                   
                    codeReader.decodeFromVideoDevice(selectedDeviceId, 'video', (result, err) => {
                        if (result) {
                            if (result.text != null) {
                                $.ajax({
                                    type: "get",
                                    url: "https://192.168.100.58:443/ta/public/user/checkScan",
                                    data: {
                                        code: result.text
                                    },
                                    dataType: "json",
                                    success: function(data) {
                                        location.replace(
                                            'https://192.168.100.58:443/ta/public/user/absen'
                                            )
                                    },
                                    error: function(request, error) {
                                        console.log(arguments);
                                        alert(" Can't do because: " + error);
                                    },
                                });
                                // const data = {
                                //     code: result.text
                                // };              

                                // const url = "https://ta.test.id/user/checkScan?"+ new URLSearchParams(data).toString();
                                // window.location.href = url;
                                // console.log(url);                      
                            }

                            // document.getElementById('result').textContent = result.text

                        }
                        if (err && !(err instanceof ZXing.NotFoundException)) {
                            console.error(err)
                            document.getElementById('result').textContent = err
                        }
                    })

                    // Jalankan fungsi doTheCalculation() setiap 40 menit sekali
                    setInterval(doTheCalculation, 40 * 60 * 1000);

                    // document.getElementById('startButton').addEventListener('click', () => {
                        console.log(`Started continous decode from camera with id ${selectedDeviceId}`)
                    // })

                    document.getElementById('resetButton').addEventListener('click', () => {
                        codeReader.reset()
                        document.getElementById('result').textContent = '';
                        console.log('Reset.')
                    })

                })
                .catch((err) => {
                    console.error(err)
                })
        })
    </script>
@endsection
