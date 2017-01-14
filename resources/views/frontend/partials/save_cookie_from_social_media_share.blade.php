<html prefix="og: http://ogp.me/ns#">
<head>
    <title>{{ $title }}</title>
    <!-- <meta http-equiv="refresh" content="0;url={{ $link_blog }}"> -->
    <meta property="og:title" content="{{ $title }}" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ $link_wordpress }}" />
    <meta property="og:image" content="{{ $meta_og_img }}" />   
<script>
window.location.href = '{{ $link_blog }}';
</script>
</head>
</html>

