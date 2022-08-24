                        @csrf
                        @method('PUT')
                        <label for="username"> Username </label>
                        <input type="text" name="username" id="" class="form-control @error('username') is-invalid @enderror" value="{{auth()->user()->name}}" disabled>
                        <br>
                        @error('username')
                            <div class="text-danger mb-2"> * {{$message}}</div>
                        @enderror
                        <br> 
                        
                        <label for="username"> Email </label>
                        <input type="text" name="email" id="" class="form-control @error('email') is-invalid @enderror" value="{{auth()->user()->email}}" disabled>
                        <br>
                        @error('email')
                            <div class="text-danger mb-2"> * {{$message}}</div>
                        @enderror