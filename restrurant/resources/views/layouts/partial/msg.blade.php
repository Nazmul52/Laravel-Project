 {{-- Danger Message --}}


 @if($errors->any())

                     @foreach($errors->all() as $error)
                        <div class="alert alert-danger">
                          <button type="button" aria-hidden="true" class="close" onclick="this.parentElement.style.display='none'">x</button>
                            <span>
                              <b>Danger - </b> {{$error}}
                            </span>
                        </div>
                     @endforeach

                @endif

{{-- Success Message --}}
                 @if(session('successMsg'))
                <div class="alert alert-success">
                  <button type="button" aria-hidden="true" class="close" onclick="this.parentElement.style.display='none'">x</button>
                    <span>
                      <b>Success - </b> {{session('successMsg')}}
                    </span>
                </div>
            @endif
{{-- Delete Message --}}

             @if(session('deleteMsg'))
                <div class="alert alert-danger">
                  <button type="button" aria-hidden="true" class="close" onclick="this.parentElement.style.display='none'">x</button>
                    <span>
                      <b>Success - </b> {{session('deleteMsg')}}
                    </span>
                </div>
            @endif