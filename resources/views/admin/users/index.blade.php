@extends('layouts.admin')

@section('content')
    <table class="table table-bordered table-hover">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>E-mail</th>
            <th>头像</th>
            <th>Created_at</th>
            <th>Updated_at</th>
            <th>操作</th>
        </tr>
        @if (count($users) === 0)
            <tr>
                <td colspan="7" align="center">暂无数据</td>
            </tr>
        @else
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <a href="{{ url('/storage'.$user->avatar) }}">
                            <img class="admin-users-avatar" src="/storage{{ $user->avatar }}" alt="" />
                        </a>
                    </td>
                    <td>{{ $user->created_at }}</td>
                    <td>{{ $user->updated_at }}</td>
                    <td>
                        <a href="{{ url('admin/users/edit') }}" class="btn btn-primary btn-xs">编辑</a>
                        <a href="{{ url('admin/users/delete') }}" class="btn btn-danger btn-xs">删除</a>
                    </td>
                </tr>
            @endforeach
        @endif
    </table>

    {{--用户头像 modal 框--}}
    <div class="modal fade user-avatar-modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">{{ $user->name }} 的头像</h4>
                </div>
                <div class="modal-body">
                    <div class="user-avatar-modal-detail">
                        <img src="{{ url('/storage').$user->avatar }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
