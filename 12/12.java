protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
    // TODO Auto-generated method stub
    doGet(request, response);
    String username = request.getParameter("username");

    Cookie userCookie = new Cookie("username", username);
    userCookie.setMaxAge(60 * 60 * 24); // Set cookie to expire in 24 hours
    response.addCookie(userCookie);

    response.setContentType("text/html");
    PrintWriter out = response.getWriter();
    out.println("<html>");
    out.println("<head><title>Cookie Example</title></head>");
    out.println("<body>");

    out.println("<h2>Hello, " + username + "!</h2>");
    out.println("<p>Your name has been saved in a cookie.</p>");

    out.println("<h3>Current Cookies:</h3>");
    Cookie[] cookies = request.getCookies();
    if (cookies != null) {
        for (Cookie cookie : cookies) {
            out.println("<p>" + cookie.getName() + " = " + cookie.getValue() + "</p>");
        }
    } else {
        out.println("<p>No cookies found.</p>");
    }

    out.println("</body></html>");
}