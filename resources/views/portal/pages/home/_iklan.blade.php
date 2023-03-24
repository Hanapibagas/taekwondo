
  <div class="row ">
      <div class="projects-slides owl-carousel owl-theme">
    @foreach ($iklan as $data)
        <div class="col-6">
            <a href="#" target="_blank"><img src="{{ asset('storage/images/iklan/' . $data->images)  }}" alt="image"></a>  
            <div class="projects-content">
                <a href="" class="read-more-btn">Read More <i class="flaticon-add-1"></i></a>
              </div> 
        </div>
    @endforeach
  </div>
  </div>