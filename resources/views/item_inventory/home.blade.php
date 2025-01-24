<x-layout>
    <div class="container">
        <div class="card">
            <div class="card-header bg-light">
                <h5 class="text-primary">ITEMS AND INVENTORY</h5>
            </div>
            <div class="card-body">
                <div class="row text-center">
                    <div class="col-md-2">
                        <a href="{{ route('items.create') }}" class="text-decoration-none">
                            <div>
                                <i class="fadeIn animated bx bx-plus-circle bx-lg text-primary"></i>
                                <p class="mt-2">New Item or Service</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-2">
                        <a href="{{ route('items.index') }}" class="text-decoration-none">
                            <div>
                                <i class="fadeIn animated bx bx-list-ul bx-lg text-primary"></i>
                                <p class="mt-2">Item List</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-2">
                        <a href="{{ route('services.index') }}" class="text-decoration-none">
                            <div>
                                <i class="fadeIn animated bx bx-list-ul bx-lg text-primary"></i>
                                <p class="mt-2">Service List</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-2">
                        <a href="{{ route('measures.index') }}" class="text-decoration-none">
                            <div>
                                <i class="fadeIn animated bx bx-cog bx-lg text-primary"></i>

                                <p class="mt-2">Unit of Measure</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-2">
                        <a href="{{ route('stocks.opening') }}" class="text-decoration-none">
                            <div>
                                <i class="fadeIn animated bx bx-plus-medical bx-lg text-primary"></i>
                                <p class="mt-2">Opening Stock</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-2">
                        <a href="{{ route('writeoffs.index') }}" class="text-decoration-none">
                            <div>
                                <i class="fadeIn animated bx bx-x-circle bx-lg text-primary"></i>
                                <p class="mt-2">Write-Off</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Inventory Reports Section -->
        <div class="card mt-4">
            <div class="card-header bg-light">
                <h5 class="text-primary">INVENTORY REPORTS</h5>
            </div>
            <div class="card-body">
                <div class="row text-center">
                    <div class="col-md-3">
                        <a href="{{ route('reports.value_summary') }}" class="text-decoration-none">
                            <div>
                                <i class="fadeIn animated bx bx-file bx-lg text-primary"></i>
                                <p class="mt-2">Inventory Value Summary Report</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a href="{{ route('reports.quantity_summary') }}" class="text-decoration-none">
                            <div>
                                <i class="fadeIn animated bx bx-file bx-lg text-primary"></i>
                                <p class="mt-2">Inventory Quantity Summary Report</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a href="{{ route('reports.quantity_by_location') }}" class="text-decoration-none">
                            <div>
                                <i class="fadeIn animated bx bx-file bx-lg text-primary"></i>
                                <p class="mt-2">Inventory Quantity By Location Report</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a href="{{ route('reports.profit_margin') }}" class="text-decoration-none">
                            <div>
                                <i class="fadeIn animated bx bx-file bx-lg text-primary"></i>
                                <p class="mt-2">Inventory Profit Margin Report</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
