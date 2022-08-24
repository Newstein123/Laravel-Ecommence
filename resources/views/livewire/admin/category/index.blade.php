<div>
    <div class="d-flex justify-content-between">
            <h3> Category </h3>
            <div class="btn btn-primary btn-sm">
               <a href="{{url('admin/category/create')}}" class="text-decoration-none text-white">  Add Category </a>
            </div>
            </div>
            <hr>
            <div class="container">
                <table class="table striped">
                    <thead>
                        <tr>
                            <th> ID </th>
                            <th> Name </th>
                            <th> Status </th>
                            <th> Action </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                        <tr>
                          
                            {{-- //   $sn = $category->id;
                            //    $sn = 0;
                            //    $sn++
                            // @endphp --}}
                            <th> {{$category->id}}</th>
                            <th> {{$category->name}}</th>
                            <th> {{$category->status == 0? "Visible": "Hidden"}}</th>
                            <th> 
                              <div class="d-flex justify-content-around"> 
                                <a href="/admin/category/{{$category->id}}/edit" class="btn btn-success text-decoration-none text-dark"> Edit </a>
                                <form action="/admin/category/{{$category->id}}" method="post" onclick="return confirm('Are You Sure to delete')">
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" class="btn btn-danger"> Delete </button>
                                </form>
                              </div>
                            </th>
                        </tr>
                        @endforeach   
                    </tbody>
                </table>
            </div>

            {{$categories->links()}}
          
</div>
