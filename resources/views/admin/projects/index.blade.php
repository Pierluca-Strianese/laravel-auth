@extends('admin.layouts.base')

@section('contents')
    <table class="table align-middle">
        <thead>
            <tr>
                <th scope="col" class="text-center">Title</th>
                <th scope="col" class="text-center">Author</th>
                <th scope="col" class="text-center">Last Update</th>
                <th scope="col" class="text-center">Collaborators</th>
                <th scope="col" class="text-center">Description</th>
                <th scope="col" class="text-center">Languages</th>
                <th scope="col" class="text-center">Link Github</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($projects as $project)
                <tr>
                    <th scope="row">{{ $project->title }}</th>
                    <td>{{ $project->author }}</td>
                    <td class="font-monospace">{{ $project->last_update }}</td>
                    <td>{{ $project->collaborators }}</td>
                    <td>{{ $project->description }}</td>
                    <td class="font-monospace">{{ $project->languages }}</td>
                    <td class="text-center"> <a href="{{ $project->link_github }}"> LINK </a></td>
                    <td class="text-center">
                        <a class="btn btn-primary m-1"
                            href="{{ route('admin.project.show', ['project' => $project->id]) }}">View</a>
                        <a class="btn btn-warning m-1"
                            href="{{ route('admin.project.edit', ['project' => $project->id]) }}">Edit</a>
                        <button type="button" class="btn btn-danger js-delete" data-bs-toggle="modal"
                            data-bs-target="#deleteModal" data-id="{{ $project->id }}">
                            Delete
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="deleteModalLabel">Delete confirmation</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                    <form action="{{ route('admin.project.destroy', ['project' => $project]) }}" method="post"
                        class="d-inline-block" id="confirm-delete"
                        data-template="{{ route('admin.project.destroy', ['project' => '*****']) }}">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger">Yes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
