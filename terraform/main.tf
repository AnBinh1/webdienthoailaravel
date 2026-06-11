module "storage" {
  source      = "./modules/storage"
  bucket_name = var.bucket_name
}

module "notification" {
  source     = "./modules/notification"
  topic_name = var.topic_name
}

module "iam" {
  source        = "./modules/iam"
  iam_user_name = var.iam_user_name
}