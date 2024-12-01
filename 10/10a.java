private static final String[] GREETINGS = {
    "Hello", "Welcome", "Hi there", "Greetings", "Hey", "Good to see you"
};
protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {

response.getWriter().append("Served at: ").append(request.getContextPath());
String username = request.getParameter("name");
Random random = new Random();
String greeting = GREETINGS[random.nextInt(GREETINGS.length)];
response.setContentType("text/html");
PrintWriter out = response.getWriter();
out.println("<html><body>");
out.println("<h2>" + greeting + ", " + username + "!</h2>");
out.println("</body></html>");
}
