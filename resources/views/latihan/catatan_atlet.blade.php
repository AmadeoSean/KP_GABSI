@extends( Auth::user()->role_id == 3 ? 'latihan.catatan_latihan' : (Auth::user()->role_id == 2 ? 'latihan.catatan_latihan' : 'latihan.catatan_latihan') )
@section('notes')
<div class="page-content container note-has-grid">
    
    <div class="tab-content bg-transparent">
        <div id="note-full-container" class="note-has-grid row">
            <div class="col-md-4 single-note-item all-category" style="">
                <div class="card card-body">
                    <span class="side-stick"></span>
                    <h5 class="note-title text-truncate w-75 mb-0" data-noteheading="Book a Ticket for Movie">Book a Ticket for Movie <i class="point fa fa-circle ml-1 font-10"></i></h5>
                    <p class="note-date font-12 text-muted">11 March 2009</p>
                    <div class="note-content">
                        <p class="note-inner-content text-muted" data-notecontent="Blandit tempus porttitor aasfs. Integer posuere erat a ante venenatis.">Blandit tempus porttitor aasfs. Integer posuere erat a ante venenatis.</p>
                    </div>
                    <div class="d-flex align-items-center">
                        <span class="mr-1"><i class="fa fa-star favourite-note"></i></span>
                        <span class="mr-1"><i class="fa fa-trash remove-note"></i></span>
                        <div class="ml-auto">
                            <div class="category-selector btn-group">
                                <a class="nav-link dropdown-toggle category-dropdown label-group p-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="true">
                                    <div class="category">
                                        <div class="category-business"></div>
                                        <div class="category-social"></div>
                                        <div class="category-important"></div>
                                        <span class="more-options text-dark"><i class="icon-options-vertical"></i></span>
                                    </div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right category-menu">
                                    <a class="note-business badge-group-item badge-business dropdown-item position-relative category-business text-success" href="javascript:void(0);">
                                        <i class="mdi mdi-checkbox-blank-circle-outline mr-1"></i>Business
                                    </a>
                                    <a class="note-social badge-group-item badge-social dropdown-item position-relative category-social text-info" href="javascript:void(0);">
                                        <i class="mdi mdi-checkbox-blank-circle-outline mr-1"></i> Social
                                    </a>
                                    <a class="note-important badge-group-item badge-important dropdown-item position-relative category-important text-danger" href="javascript:void(0);">
                                        <i class="mdi mdi-checkbox-blank-circle-outline mr-1"></i> Important
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
@endsection