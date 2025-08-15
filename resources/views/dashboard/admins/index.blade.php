@extends('dashboard.layouts.base')
@section('content')
<style>
.card-header::after {
  content: none !important;
}

#example2 th,
#example2 td {
    vertical-align: middle;
    text-align: center;
}
</style>
<div class="col-12">
    <div class="card ">
        <div class="card-header d-flex justify-content-between align-items-center w-100"
            style="direction: rtl;">
            <h3 class="card-title mb-0">المشرفين</h3>
            <a href="{{route('dashboard.admin.create')}}" class="btn btn-success" style="content: none !important;">
            اضافه مشرف
            </a>
            
        </div>

        <!-- /.card-header -->
        <div class="card-body">
            <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                    <div class="col-sm-12 col-md-6"></div>
                    <div class="col-sm-12 col-md-6"></div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <table id="example2" class="table table-bordered table-hover dataTable text-center"
                            role="grid" style="direction: rtl;" aria-describedby="example2_info">
                            <thead>
                                <tr role="row">
                                    <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1"
                                        colspan="1" aria-sort="ascending"
                                        aria-label="Rendering engine: activate to sort column descending">
                                        #
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                        colspan="1" aria-label="Browser: activate to sort column ascending">
                                        الاسم
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                        colspan="1" aria-label="Platform(s): activate to sort column ascending">
                                        الايميل
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                        colspan="1" aria-label="Engine version: activate to sort column ascending">
                                        الصوره
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                        colspan="1" aria-label="Engine version: activate to sort column ascending">
                                        العمليات
                                    </th>
                                    {{-- <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                        colspan="1" aria-label="CSS grade: activate to sort column ascending">CSS
                                        grade
                                    </th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($admins as $index => $admin)
                                    <tr role="row" class="odd">
                                        <td class="sorting_1">{{ $admins->firstItem() + $index }}</td>
                                        <td>{{ $admin->name }}</td>
                                        <td>{{ $admin->email }}</td>
                                        <td>
                                            <img src="{{ $admin->image }}" alt="admin.jpg" style="width: 4rem">
                                        </td>
                                        <td>
                                            <a href="{{route('dashboard.admin.show',$admin->id)}}" class="btn btn-primary btn-sm">عرض</a>
                                            <a href="{{route('dashboard.admin.edit',$admin->id)}}" class="btn btn-info btn-sm">تعديل</a>
                                            <form action="{{ route('dashboard.admin.delete', $admin->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('هل أنت متأكد من حذف هذا المشرف؟');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">حذف</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
                <div class="row">

                    <div class="col-12 d-flex justify-content-end">
                        {{ $admins->links() }}
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->


    <!-- /.card -->
</div>
@endsection