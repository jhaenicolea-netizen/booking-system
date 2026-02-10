<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit();
}

// Handle Delete
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    $conn->query("DELETE FROM bookings WHERE id=$id");
    header("Location: dashboard.php");
}

// Search Logic
$search = isset($_GET['search']) ? $conn->real_escape_string($_GET['search']) : '';
$whereClause = "";
if ($search) {
    $whereClause = "WHERE customer_name LIKE '%$search%' OR email LIKE '%$search%' OR phone LIKE '%$search%'";
}

$sql = "SELECT * FROM bookings $whereClause ORDER BY booking_date DESC, booking_time ASC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Manager Pro</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%);
            --glass-bg: rgba(255, 255, 255, 0.95);
            --border-color: #e2e8f0;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f3f4f6;
            color: #1f2937;
        }

        /* Modern Navbar */
        .navbar {
            background: var(--primary-gradient);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }
        
        .navbar-brand {
            font-weight: 700;
            letter-spacing: -0.025em;
        }

        /* Cards */
        .card-custom {
            background: white;
            border: 1px solid var(--border-color);
            border-radius: 1rem;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
            transition: all 0.2s;
        }
        
        /* Form Styling */
        .form-label {
            font-size: 0.875rem;
            font-weight: 500;
            color: #4b5563;
            margin-bottom: 0.5rem;
        }
        
        .form-control, .form-select {
            border-radius: 0.5rem;
            border-color: #d1d5db;
            padding: 0.625rem;
            font-size: 0.95rem;
        }
        
        .form-control:focus, .form-select:focus {
            border-color: #6366f1;
            box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.1);
        }

        .section-title {
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: #9ca3af;
            font-weight: 600;
            margin-bottom: 1rem;
            display: block;
        }

        /* Table Styling */
        .table-custom th {
            background-color: #f9fafb;
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: #6b7280;
            font-weight: 600;
            padding: 1rem;
        }
        
        .table-custom td {
            padding: 1rem;
            vertical-align: middle;
            border-bottom: 1px solid #f3f4f6;
        }

        .avatar-circle {
            width: 40px;
            height: 40px;
            background: #eff6ff;
            color: #3b82f6;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            font-size: 1.1rem;
        }

        /* Status Badges */
        .badge-status {
            padding: 0.35rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: 600;
        }
        .status-confirmed { background: #dcfce7; color: #166534; }
        .status-pending { background: #fef9c3; color: #854d0e; }
        .status-cancelled { background: #fee2e2; color: #991b1b; }

        /* Buttons */
        .btn-primary-custom {
            background: var(--primary-gradient);
            border: none;
            color: white;
            font-weight: 500;
            padding: 0.625rem 1.25rem;
            border-radius: 0.5rem;
        }
        .btn-primary-custom:hover {
            opacity: 0.9;
            color: white;
            transform: translateY(-1px);
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-dark sticky-top mb-5">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <i class="bi bi-calendar-check-fill me-2"></i>
                Booking Manager Pro
            </a>
            <div class="d-flex align-items-center gap-3">
                <div class="text-white opacity-75 small d-none d-md-block">
                    Logged in as <strong><?= htmlspecialchars($_SESSION['user']) ?></strong>
                </div>
                <a href="logout.php" class="btn btn-sm btn-light bg-white text-primary fw-bold border-0 shadow-sm">
                    Logout <i class="bi bi-box-arrow-right ms-1"></i>
                </a>
            </div>
        </div>
    </nav>

    <div class="container pb-5">
        
        <div class="row g-4">
            
            <div class="col-lg-4">
                <div class="card card-custom h-100 sticky-lg-top" style="top: 100px; z-index: 1;">
                    <div class="card-body p-4">
                        <h5 class="fw-bold mb-4 d-flex align-items-center text-dark">
                            <i class="bi bi-plus-circle-fill text-primary me-2"></i> New Reservation
                        </h5>
                        
                        <form action="add.php" method="POST">
                            
                            <span class="section-title">Guest Information</span>
                            <div class="mb-3">
                                <label class="form-label">Full Name</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0"><i class="bi bi-person"></i></span>
                                    <input type="text" name="name" class="form-control border-start-0 ps-0" placeholder="John Doe" required>
                                </div>
                            </div>
                            
                            <div class="row g-2 mb-3">
                                <div class="col-6">
                                    <label class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control" placeholder="name@mail.com" required>
                                </div>
                                <div class="col-6">
                                    <label class="form-label">Phone</label>
                                    <input type="text" name="phone" class="form-control" placeholder="0912..." required>
                                </div>
                            </div>

                            <hr class="my-4 opacity-10">

                            <span class="section-title">Booking Details</span>
                            <div class="row g-2 mb-3">
                                <div class="col-7">
                                    <label class="form-label">Service Type</label>
                                    <select name="service" class="form-select">
                                        <option>Consultation</option>
                                        <option>Dinner Reservation</option>
                                        <option>Haircut / Salon</option>
                                        <option>General Appointment</option>
                                    </select>
                                </div>
                                <div class="col-5">
                                    <label class="form-label">Guests</label>
                                    <input type="number" name="guests" class="form-control" value="1" min="1">
                                </div>
                            </div>

                            <div class="row g-2 mb-3">
                                <div class="col-7">
                                    <label class="form-label">Date</label>
                                    <input type="date" name="date" class="form-control" required>
                                </div>
                                <div class="col-5">
                                    <label class="form-label">Time</label>
                                    <input type="time" name="time" class="form-control" required>
                                </div>
                            </div>

                            <div class="mb-4">
                                <label class="form-label">Special Requests</label>
                                <textarea name="notes" class="form-control" rows="2" placeholder="Allergies, wheelchair access, etc..."></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary-custom w-100 shadow-sm">
                                Confirm Booking
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                
                <div class="card card-custom mb-4 p-3 border-0 bg-white">
                    <form method="GET" class="d-flex gap-2">
                        <div class="input-group">
                            <span class="input-group-text bg-white border-end-0 text-muted"><i class="bi bi-search"></i></span>
                            <input type="text" name="search" class="form-control border-start-0 ps-0" placeholder="Search by name, email, or phone..." value="<?= htmlspecialchars($search) ?>">
                        </div>
                        <button type="submit" class="btn btn-dark px-4">Search</button>
                        <?php if($search): ?>
                            <a href="dashboard.php" class="btn btn-outline-secondary" title="Clear"><i class="bi bi-x-lg"></i></a>
                        <?php endif; ?>
                    </form>
                </div>

                <div class="card card-custom overflow-hidden">
                    <div class="table-responsive">
                        <table class="table table-custom table-hover mb-0">
                            <thead>
                                <tr>
                                    <th>Guest</th>
                                    <th>Service</th>
                                    <th>Schedule</th>
                                    <th>Status</th>
                                    <th class="text-end">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($result->num_rows > 0): ?>
                                    <?php while ($row = $result->fetch_assoc()): ?>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="avatar-circle me-3">
                                                    <?= strtoupper(substr($row['customer_name'], 0, 1)) ?>
                                                </div>
                                                <div>
                                                    <div class="fw-bold text-dark"><?= htmlspecialchars($row['customer_name']) ?></div>
                                                    <div class="small text-muted"><?= htmlspecialchars($row['phone']) ?></div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="fw-medium text-dark"><?= htmlspecialchars($row['service_type']) ?></div>
                                            <div class="small text-muted"><i class="bi bi-people me-1"></i> <?= $row['guests'] ?> Guests</div>
                                        </td>
                                        <td>
                                            <div class="d-flex flex-column">
                                                <span class="fw-medium"><?= date('M d, Y', strtotime($row['booking_date'])) ?></span>
                                                <span class="small text-muted"><?= date('h:i A', strtotime($row['booking_time'])) ?></span>
                                            </div>
                                        </td>
                                        <td>
                                            <?php 
                                                $status = $row['status'];
                                                $badgeClass = 'status-pending'; // Default
                                                if ($status == 'Confirmed') $badgeClass = 'status-confirmed';
                                                if ($status == 'Cancelled') $badgeClass = 'status-cancelled';
                                            ?>
                                            <span class="badge badge-status <?= $badgeClass ?>">
                                                <?= $status ?>
                                            </span>
                                        </td>
                                        <td class="text-end">
                                            <div class="btn-group">
                                                <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-light text-primary border" title="Edit">
                                                    <i class="bi bi-pencil-square"></i>
                                                </a>
                                                <a href="dashboard.php?delete=<?= $row['id'] ?>" class="btn btn-sm btn-light text-danger border" onclick="return confirm('Delete this booking?')" title="Delete">
                                                    <i class="bi bi-trash"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php endwhile; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="5" class="text-center py-5">
                                            <div class="text-muted opacity-50 mb-2">
                                                <i class="bi bi-inbox fs-1"></i>
                                            </div>
                                            <h6 class="text-muted fw-normal">No bookings found</h6>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</body>
</html>