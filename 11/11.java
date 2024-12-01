protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
    // TODO Auto-generated method stub
    response.getWriter().append("Served at: ").append(request.getContextPath());
    LocalTime currentTime = LocalTime.now();
    String greeting;
    if (currentTime.isBefore(LocalTime.NOON)) {
        greeting = "Good Morning!";
    } else if (currentTime.isBefore(LocalTime.of(17, 0))) {
        greeting = "Good Afternoon!";
    } else {
        greeting = "Good Evening!";
    }
    response.setContentType("text/html");
    PrintWriter out = response.getWriter();
    out.println("<html>");
    out.println("<head><title>Greeting Message</title></head>");
    out.println("<body>");
    out.println("<h2>" + greeting + "</h2>");
    out.println("<p>The current server time is: " + currentTime + "</p>");
    out.println("<a href='greeting.html'>Back to Home</a>");  // Link to go back to the HTML page
    out.println("</body></html>");
}

