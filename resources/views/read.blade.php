<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" class="width=device-width, initial-scale=1.0">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Baca Buku</title>
	@vite(['resources/assets/css/bootstrap.min.75a07e3a3100a6fed983b15ad1b297c127a8c2335854b0efc3363731475cbed6.css','resources/assets/css/nifty.min.4d1ebee0c2ac4ed3c2df72b5178fb60181cfff43375388fee0f4af67ecf44050.css'])
</head>
<script src="{{asset('assets/js/lib/webviewer.min.js')}}"></script>
<body>
	<div id='viewer' style="width:100vw;height:100vh;margin:0 auto;" data-prevpage="@json($prevPage)" data-latestpage="@json($latestPage)" data-readsession="@json($sesi)" data-newreader="@json($newReader)" data-bookid="@json(Crypt::encryptString($buku->id))"></div>
	@vite('resources/js/app.js')
	<script>
	var errMsg,isError=!1;const app=document.getElementById("viewer");var prevPage=parseInt(app.dataset.prevPage),latestPage=parseInt(app.dataset.latestpage);const session=app.dataset.readsession,newReader=app.dataset.newreader,book_id=app.dataset.bookid;WebViewer({path:'{{asset("assets/js/lib")}}',licenseKey:"Zmb9M9JNJJDw9Oi2jJy9",initialDoc:"{{ Storage::url('files/buku/'.$buku->url_pdf) }}",disabledElements:["leftPanelButton","viewControlsButton","viewControlsOverlay","panToolButton","selectToolButton","downloadButton"]},document.getElementById("viewer")).then(e=>{let{Core:t,UI:a,docViewer:s}=e,r=t.Tools.ToolNames.PAN;a.iframeWindow.addEventListener("loaderror",e=>{isError=!0,errMsg=e}),a.setToolMode(r),a.setHeaderItems(e=>{e.delete(1),e.push({type:"customElement",render(){let e=document.createElement("button");return e.innerHTML="Kembali",e.style.color="#485056",e.style.backgroundColor="#dde6ee",e.style.border="none",e.style.padding="7px 15px",e.style.fontWeight="bold",e.style.cursor="pointer",e.style.borderRadius="3px",e.onclick=()=>{window.location.href=window.location.origin},e}})}),t.documentViewer.addEventListener("documentLoaded",()=>{s.setCurrentPage(latestPage),newReader&&save_read()}),t.documentViewer.addEventListener("pageNumberUpdated",e=>{e>latestPage&&(latestPage=e,save_read())})});let savetimer;function save_read(e=!1){if(!isError){var t=document.querySelector('meta[name="csrf-token"]').getAttribute("content");clearTimeout(savetimer),savetimer=setTimeout(()=>{axios.post(`${window.location.origin}/api/read/save`,{sesi:session,buku_id:book_id,progress:latestPage,prev_progress:prevPage},{headers:{"X-CSRF-TOKEN":t}}).then(t=>{console.log(t),e&&showSuccessToast("Tersimpan","{{asset('assets/img/icon/success.svg')}}")}).catch(e=>{console.error(e)})},1e3)}}
	</script>
</body>
</html>