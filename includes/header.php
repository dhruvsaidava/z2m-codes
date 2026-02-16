<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($page_title) ? $page_title . ' - ' . SITE_NAME : SITE_NAME; ?></title>
    <meta name="description" content="<?php echo SITE_DESCRIPTION; ?>">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Highlight.js for syntax highlighting -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/styles/atom-one-dark.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/highlight.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/languages/arduino.min.js"></script>
    
    <!-- Custom Styles -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');
        
        body {
            font-family: 'Inter', sans-serif;
        }
        
        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        
        .gradient-text {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .code-card:hover {
            transform: translateY(-5px);
            transition: all 0.3s ease;
        }
        
        .category-card:hover {
            transform: scale(1.05);
            transition: all 0.3s ease;
        }
        
        pre code {
            border-radius: 8px;
        }
        
        .badge {
            display: inline-block;
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: 600;
        }
        
        .badge-green { background-color: #d1fae5; color: #065f46; }
        .badge-yellow { background-color: #fef3c7; color: #92400e; }
        .badge-red { background-color: #fee2e2; color: #991b1b; }
        
        /* Force Navigation Order: Home (1), Categories (2), All Codes (3) */
        #nav-home {
            order: 1 !important;
            display: inline-block !important;
        }
        #nav-categories {
            order: 2 !important;
            display: inline-block !important;
        }
        #nav-all-codes {
            order: 3 !important;
            display: inline-block !important;
        }
        
        /* Ensure navigation container uses flexbox */
        nav .hidden.md\:flex,
        nav div[class*="hidden"][class*="md:flex"] {
            display: flex !important;
            flex-direction: row !important;
        }
        
        /* Table Styles */
        .table-container {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
            background: white;
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            padding: 0;
        }
        
        .component-table {
            width: 100%;
            border-collapse: collapse;
            margin: 0;
            background: white;
            display: table;
        }
        
        .component-table thead {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            display: table-header-group;
        }
        
        .component-table th {
            padding: 1rem;
            text-align: left;
            font-weight: 600;
            font-size: 0.875rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            border: none;
        }
        
        .component-table tbody {
            display: table-row-group;
        }
        
        .component-table td {
            padding: 0.875rem 1rem;
            border-bottom: 1px solid #e5e7eb;
            color: #374151;
            display: table-cell;
        }
        
        .component-table tbody tr {
            transition: background-color 0.2s ease;
            display: table-row;
        }
        
        .component-table tbody tr:hover {
            background-color: #f3f4f6;
        }
        
        .component-table tbody tr:last-child td {
            border-bottom: none;
        }
        
        @media (max-width: 640px) {
            .component-table th,
            .component-table td {
                padding: 0.75rem 0.5rem;
                font-size: 0.8125rem;
            }
        }
        
        /* Logo responsive: aligned and sized for mobile + desktop */
        .navbar-logo {
            display: block;
            height: 2rem;
            width: auto;
            max-width: 140px;
            object-fit: contain;
            object-position: left center;
            vertical-align: middle;
        }
        
        @media (min-width: 640px) {
            .navbar-logo {
                height: 2.5rem;
                max-width: 200px;
            }
        }
        
        /* Keep logo area from overflowing on small phones */
        @media (max-width: 380px) {
            .navbar-logo {
                max-width: 120px;
            }
        }
    </style>
</head>
<body class="bg-gray-50">
    <?php include 'includes/navbar.php'; ?>


