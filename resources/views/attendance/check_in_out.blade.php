@extends('layouts.app',['title'=>'Staffs'])
@push('styles')
<style type="text/css">
  video,canvas{
    position: absolute;
  }
    .check_in_btn_container,.check_out_btn_container{
    margin-top: 20px;
  }
  .check_in_btn, .check_out_btn{
    margin: 10px;
    font-weight: 600;
    font-size: 25px;
    padding: 15px 10px;
    border-radius: 60px;
    height: 100px;
    width: 100px;
    color: white;
  }
  .check_in_btn{
    border: 3px solid #338000;
    background-color: #63b929;
  }
  .check_in_btn:hover{
    background-color: #509821;
    color: white;
  }
  .check_out_btn{
    border: 3px solid #940000;
    background-color: #e20000;
  }
  .check_out_btn:hover{
    background-color: #ff0000;
    color: white;
  }
  .check_in_out_body{
    min-height: 300px;
    text-align: center;
  }
</style>
@endpush
@section('content')
          <div class="card">
            <div class="card-header">
              <h3 class="mb-0">Social</h3>
            </div>
            <div class="card-body check_in_out_body">
              <div class="col-md-4 check_in_out_video">  
                <div id="container"  name='cont' class="container-fluid no-padding ">
                  <video autoplay="true" id="videoElement" name='vid' width="320" height="240"></video>
                  <canvas id="canvas" height="240" width="320" ></canvas>
                  <div id="captured_photo"></div>
                </div>
              </div>
                <div class="col-md-12 check_in_btn_container">
                  <button  type="button" class="btn check_in_btn" id="check_in_btn" type="submit" onclick="checkin();">
                    IN 
                  </button>
                </div>
                <div class="col-md-12 check_out_btn_container">
                  <button  type="button" class="btn check_out_btn" id="check_out_btn" onclick="checkout();">
                    OUT
                  </button>
                </div>
              <canvas id="CANVAS" name="CANVAS" height="240" width="320">Your browser does not support Canvas.</canvas>
            </div>
          </div>
@endsection

@push('scripts')
  <script src="{{ asset('system')}}/js/tracking-min.js"></script>
  <script src="{{ asset('system')}}/js/face-min.js"></script>
  <script>
    window.onload = function() {
      var video = document.getElementById('videoElement');
      var canvas = document.getElementById('canvas');
      var context = canvas.getContext('2d');

      var tracker = new tracking.ObjectTracker('face');
      tracker.setInitialScale(4);
      tracker.setStepSize(2);
      tracker.setEdgesDensity(0.1);

      tracking.track('#videoElement', tracker, { camera: true });

      tracker.on('track', function(event) {
        context.clearRect(0, 0, canvas.width, canvas.height);

        event.data.forEach(function(rect) {
          context.strokeStyle = '#a64ceb';
          context.strokeRect(rect.x, rect.y, rect.width, rect.height);
          context.font = '11px Helvetica';
          context.fillStyle = "#fff";
          context.fillText('Face Detected', rect.x + rect.width + 5, rect.y + 11);
          // context.fillText('x: ' + rect.x + 'px', rect.x + rect.width + 5, rect.y + 11);
          // context.fillText('y: ' + rect.y + 'px', rect.x + rect.width + 5, rect.y + 22);
        });
      });

      var gui = new dat.GUI();
      gui.add(tracker, 'edgesDensity', 0.1, 0.5).step(0.01);
      gui.add(tracker, 'initialScale', 1.0, 10.0).step(0.1);
      gui.add(tracker, 'stepSize', 1, 5).step(0.1);
    };
  </script>
@endpush