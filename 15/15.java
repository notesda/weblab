import java.io.PrintWriter;
protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		// TODO Auto-generated method stub
		doGet(request, response);
		response.setContentType("text/html");

        String username = request.getParameter("username");
        String address = request.getParameter("address");

        PrintWriter out = response.getWriter();
        out.println("<html><head><title>User Information</title></head><body>");
        out.println("<h2>User Information</h2>");
        out.println("<p>Username: " + username + "</p>");
        out.println("<p>Address: " + address + "</p>");
        out.println("</body></html>");
        out.close();
	}