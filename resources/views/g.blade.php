@extends('layouts.applanding')

@section('breadcrumb')
<div>
    <button id="likeBtn" class="{{ $post->isLikedByUser() ? 'liked' : '' }}" data-post-id="{{ $post->id }}">
        Like
    </button>
    <span id="likeCount">{{ $post->likes }}</span> likes
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('#likeBtn').click(function () {
            var btn = $(this);
            var postId = btn.data('post-id');
            
            $.ajax({
                type: "POST",
                url: "{{ route('like', ':id') }}".replace(':id', postId),
                dataType: 'json',
                success: function (data) {
                    $('#likeCount').text(data.likes + ' likes');
                    btn.toggleClass('liked');
                }
            });
        });
    });
</script>
@endsection
@push('css')
<style>
         #likeBtn {
        background-color: #fff;
        border: none;
        cursor: pointer;
    }
    
    #likeBtn.liked {
        background-color: #ff0000; /* Ubah warna sesuai kebutuhan */
        color: #fff;
    }
</style>
@endpush