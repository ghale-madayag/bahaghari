<section class="section section-lg section-shaped pb-250" id="home">
    <div class="shape shape-style-1 shape-primary">
        <span class="span-150"></span>
        <span class="span-50"></span>
        <span class="span-50"></span>
        <span class="span-75"></span>
        <span class="span-100"></span>
        <span class="span-75"></span>
        <span class="span-50"></span>
        <span class="span-100"></span>
        <span class="span-50"></span>
        <span class="span-100"></span>
    </div>
    <div class="container py-lg-md d-flex">
        <div class="col px-0">
        <div class="row">
            <div class="col-lg-6">
                <h1 class="display-3  text-white">At Bahaghari Express Cargo
                </h1>
                <p class="lead  text-white">we strive to provide exceptional customer 
                        service with the continuous efforts of our well- experienced personnel, 
                        here and abroad, by being sensitive to the good values and meeting 
                        the ethical standards in the industry of Logistics.  Not only do we provide a highly competitive transit and delivery time for your
                        cargoes but we also guarantee you a fast access to the delivery status of your
                            balikbayan boxes online. </p>
                <div class="btn-wrapper">
                    <a href="#" class="btn btn-info btn-icon mb-3 mb-sm-0">
                    <span class="btn-inner--icon"><i class="ni ni-send"></i></span>
                    <span class="btn-inner--text">Contact us</span>
                    </a>
                    <a href="#" class="btn btn-white btn-icon mb-3 mb-sm-0">
                    <span class="btn-inner--icon"><i class="ni ni-delivery-fast"></i></span>
                    <span class="btn-inner--text">Inquiry</span>
                    </a>
                </div>
            </div>
            <div class="col-lg-6 col-sm-6">
                <!-- <div class="transform-perspective-right"> -->
                    <!-- <div class="card bg-secondary shadow border-0"> -->
                        <!-- <div class="card-header bg-primary pb-1 bg-gradient-primary"> -->
                            <!-- <h2 class="display-4 text-white text-center">
                                Track your box
                            </h2> -->
                        <!-- </div> -->
                        <div class="card-body px-lg-5 py-lg-5">
                            <h2 class="display-4 text-white text-center">
                                Track your box
                            </h2>
                            <form role="form" class="form-horizontal" method="post" id="form-track" enctype="multipart/form-data">
                                <div class="form-group">
                                    <div class="input-group input-group-alternative mb-4">
                                        <input class="form-control" placeholder="Enter invoice number..." type="text" id="trackNo">
                                        <div class="input-group-append">
                                        <span class="input-group-text"><i class="ni ni-zoom-split-in"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group text-center">
                                <button type="submit" class="btn btn-primary bg-gradient-warning btn-icon mb-3 mb-sm-0">
                                    <span class="btn-inner--icon"><i class="ni ni-box-2"></i></span>
                                    <span class="btn-inner--text">Track Package</span>
                                </button>
                                </div>
                            </form>
                        </div>
                    <!-- </div> -->
                <!-- </div> -->
            </div>
        </div>
        </div>
    </div>
    <!-- SVG separator -->
    <div class="separator separator-bottom separator-skew">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
        <polygon class="fill-white" points="2560 0 2560 100 0 100"></polygon>
        </svg>
    </div>
</section>
<div class="modal fade" id="trackModal" tabindex="-1" role="dialog" aria-labelledby="trackModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Shipment Status</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div id="loader"></div>
            <div id="statDiv"></div>
            <!--data here-->
            <div id="trackData"></div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        </div>
    </div>
</div>

<div class="modal fade" id="inqModal" tabindex="-1" role="dialog" aria-labelledby="trackModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <!--data here-->
            <div id="inqData"></div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        </div>
    </div>
</div>