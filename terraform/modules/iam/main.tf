resource "aws_iam_user" "cicd_user" {
  name = var.iam_user_name
  tags = {
    Project     = "WebDienThoai"
    Environment = "CI/CD"
    ManagedBy   = "Terraform"
  }
}

resource "aws_iam_user_policy" "cicd_policy" {
  name = "cicd-policy"
  user = aws_iam_user.cicd_user.name

  policy = jsonencode({
    Version = "2012-10-17"
    Statement = [
      {
        Effect   = "Allow"
        Action   = ["s3:*", "sns:*"]
        Resource = "*"
      }
    ]
  })
}