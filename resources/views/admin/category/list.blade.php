@extends('admin.master')
@section('title','List Category')
@section('admin')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Category
                        <small>List</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                
                @if (!empty($cates))
                    @if (session('delete'))
                        <p class="success">-----{{ session('delete') }}-------</p>
                    @endif
                     <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr class="center">
                                <th>STT</th>
                                <th>Name</th>
                                <th>Category Parent</th>
                          
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $temp = 0; ?>
                            @foreach ($cates as $item)
                                <?php $temp++; ?>
                                <tr class="odd gradeX center">
                                    <td>{{ $temp }}</td>
                                    <td>{{ $item->name}}</td>
                                    <td>
                                        
                                        @if($item->parent_id == 0)
                                            {{ "None" }}
                                        
                                        @else
                                            <?php 
                                                $parent = App\Category::where('id',$item['parent_id'])->first();
                                                echo $parent['name'];
                                            ?>
                                            
                                        
                                        @endif
                                    </td>
                          
                                    <td class="center"><i class="fa fa-trash-o  fa-fw"></i>
                                        <form action="{{ route('categorys.destroy',$item->id) }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="id" value="{{ $item->id }}">
                                            <button type="submit" class="btn btn-delete" name="btn-delete" onclick="return confirm_delete('Bạn có muốn xóa không??')">Delete</button>
                                        </form>
                                    </td>
                                    <td class="center"><i class="fa fa-pencil fa-fw fl-left"></i> <a href="{{ route('categorys.edit',$item->id) }}">Edit</a></td>
                                </tr>
                            @endforeach  
                            
                        </tbody>
                    </table>
                @endif
                
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

@endsection