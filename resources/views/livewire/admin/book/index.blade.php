<div>
    <div>    
            <div class="d-flex justify-content-between">
                <h3> Book </h3>
                <div class="btn btn-primary btn-sm">
                   <a href="{{url('admin/book/create')}}" class="text-decoration-none text-white">  Add Book </a>
                </div>
                </div>
                <hr>

                <div class="row justify-content-center">
                  <div class="col-lg-12">
                    <table class="table table-bordered table-striped">
                   <thead>
                    <tr>
                      <th> ID </th>
                      <th>  Book Title </th>
                      <th> View Product Details</th>
                      <th> Book Price </th>
                      <th> Categories </th>
                      <th> Action </th>
                     </tr>
                   </thead>
                     <tbody>
                      @foreach($books as $book)
                      <tr>
                        <td>{{$book->id}}</td>
                        <td>
                          {{$book->title}}
                          
                        </td>
                        <td><a href="/admin/book/{{$book->id}}" class="btn btn-primary ms-2 btn-sm"> View Book Detail </a></td>
                        <td>{{$book->price}}</td>
                      <td>
                        @foreach ($book->categories as $category) <span>{{$category->name}} | </span>                  
                          @endforeach
                        </td>  
                          <td>
                          <div class="d-flex justify-content-around"> 
                            <a href="/admin/book/{{$book->id}}/edit" class="btn btn-success text-decoration-none text-dark"> Edit </a>
                            <form action="/admin/book/{{$book->id}}" method="post" onclick="return confirm('Are You Sure to delete')">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-danger"> Delete </button>
                            </form>
                          </div>
                        </td>
                      </tr>
                      @endforeach
                     </tbody>
                    </table>
                  </div>
                </div>
     {{$books->links()}}
    </div>
    
</div>
