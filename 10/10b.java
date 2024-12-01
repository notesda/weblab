protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
    // TODO Auto-generated method stub
    doGet(request, response);
    String color = request.getParameter("color");
    response.setContentType("text/html");
    PrintWriter out = response.getWriter();
    out.println("<html>");
    out.println("<head><title>Background Color Changer</title></head>");
    out.println("<body style='background-color: " + color + ";'>");
    out.println("<h2>The background color has been set to: " + color + "</h2>");
    out.println("<a href='bgcolour.html'>Choose another color</a>");
    out.println("</body></html>");
}
